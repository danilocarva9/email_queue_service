<?php

namespace App\Jobs;


use App\Models\Notification;
use App\Models\NotificationStatus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use Throwable;
use App\Mail\SendEmail;


class SendEmailJob extends Job
{

    public $timeout = 0;
    /**
    * The number of times the job may be attempted.
    *
    * @var int
    */
    public $tries = 5;

    /**
    * Email data and params
    *
    * @var array
    */
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

       
        try {
            Mail::to($this->email['to'])
            // ->cc($array_emails)
            // ->bcc($array_emails)
            ->send(new SendEmail($this->email));
        } catch (\Exception $e) {
            return $this->response->error($e->getMessage(), 422);
        }

        

        // // get mails with status 0
        // $mails = Notification::with('user', 'notify', 'entity_objects', 'notification_status')
        //     ->whereHas('notification_status', function (Builder $query) {
        //         $query->where('status', 0)
        //             ->orderByDesc('created_at')
        //             ->limit(1);
        //     })
        //     ->get();

        // check if pending email exists
        // if ($mails->count() > 0) {
        //     foreach ($mails as $mail) {
        //         $template = $mail->entity_objects->template;

        //         //replace template var with value
        //         $token = [
        //             '[RECIEVER_NAME]' => $mail->user->name,
        //             '[SENDER_NAME]' => $mail->notify->name,
        //         ];

        //         foreach ($token as $key => $value)
        //             $template = str_replace($key, $value, $template);

        //         $details = [
        //             'subject' => $mail->entity_objects->subject,
        //             'email' => $mail->notify->email,
        //             'message' => $template
        //         ];

        //         $data = [
        //             'notification_id' => $mail->id
        //         ];

        //         try {
        //             Mail::to($details['email'])->send(new SendEmail($details));
        //             $data['status'] = 1;
        //             Notification::find($mail->id)->update([
        //                 'subject' => $details['subject'],
        //                 'email_html' => $template
        //             ]);
        //         } catch (\Exception $ex) {
        //             $data['status'] = 0;
        //             $data['remarks'] = $ex->getMessage();
        //         }

        //         // Update the status of the notification
        //         NotificationStatus::find($mail->notification_status->id)->update($data);
        //     }
        // }
    }


     /**
     * Handle a job failure.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }




}