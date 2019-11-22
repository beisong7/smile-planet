<?php

namespace App\Http\Controllers;

use App\Album;
use App\Banner;
use App\Content;
use App\Course;
use App\Coursereg;
use App\Eventreg;
use App\Focus;
use App\Http\Controllers\MailController as Mailus;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;

class EntrepreneurController extends Controller
{
    public function index()
    {
        $events = Program::where('status', 1)->where('type','entrepreneur')->get();//orderBy('id', 'DESC')->
        $banner = Banner::where('type', 'slider')->get();
        $courses = Course::where('status','active')->take(4)->get();
        $albums = Album::orderBy('id', 'DESC')->where('type', 'entrepreneur')->take(3)->get();
        $nalbums = Album::all();
        return view('entrepreneur.pages.home')
            ->with('banner', $banner)
            ->with('courses', $courses)
            ->with('albums', $albums)
            ->with('nalbums', $nalbums)
            ->with('events', $events);
    }

    public function album_view($title){
        $album = Album::where('title', $title)->first();
        $pic = $album->picture;
        return view('entrepreneur.pages.albumview')
            ->with('picture',$pic)
            ->with('album',$album);
    }


    public function about(){
        $content = Content::first();
        return view('entrepreneur.pages.about')
            ->with('content', $content);
    }

    public function albums(){
        $albums = Album::orderBy('id', 'DESC')->where('type', 'entrepreneur')->paginate(12);
        return view('entrepreneur.pages.albums')
            ->with('albums', $albums);
    }

    public function courselist(){
        $courses = Course::all();
        return view('entrepreneur.pages.courselist')->with('courses',$courses);

    }

    public function focus_preview($name){

        $content = Focus::first();
        $key = '';
        $title = '';

        switch ($name){
            case 'Career':
                $key = 'career';
                $title = 'Career';
                break;
            case 'Technical':
                $key = 'technical';
                $title = 'Technical';
                break;
            case 'Mentoring':
                $key = 'mentoring';
                $title = 'Mentoring';
                break;
            case 'Life Coaching':
                $key = 'l_coaching';
                $title = 'Life Coaching';
                break;
            case 'Vocation & Skills':
                $key = 'vocation_skills';
                $title = 'Vocation & Skills';
                break;
            case 'Entrepreneurship':
                $key = 'etrep';
                $title = 'Entrepreneurship';
                break;
            case 'Leadership & Governance':
                $key = 'l_gov';
                $title = 'Leadership & Governance';
                break;
            case 'Man (Body, Soul & Spirit) Mind':
                $key = 'body_spirit';
                $title = 'Man (Body, Soul & Spirit) Mind';
                break;
        }

        $data['title'] = $title;
        $data['content'] = $content[$key];
        return view('entrepreneur.pages.focus')->with('data', $data);
    }

    public function coursedetails($title){

        $course = Course::where('title', $title)->first();

        if($course)
            return view('entrepreneur.pages.course_view')->with('course',$course);
        else
            return view('errors.404');

    }

    public function coursereg($title){
        $course = Course::where('title', $title)->first();

        if($course)
            return view('entrepreneur.pages.course_reg')->with('course',$course);
        else
            return view('errors.404');
    }

    public function registerevent(Request $request){

        $data = $request->all();
        $data['dob'] = $data['dob_y'].'-'.$data['dob_m'].'-'.$data['dob_d'];
//        return $data;
        // check if this email is already available
        $eml = $data['email'];
        $eid = $data['program_id'];

        $ticketNo = $this->ticketter();

        //event details
        $event = Program::find($data['program_id']);
        $username = ''.$data['fname'] .' '. $data['lname'];
        $message = "";
        if($event->ticket==='yes'){
            $message = "Hi " . $data['fname'] . "! We received your registration to partake in our event which comes up on the "
                . date('F jS, Y', strtotime($event->date)) . " with the Theme <b>$event->title</b>. <br>".
                " You have received a Ticket Number. Please remember to come to the event with this Ticket Number for verification. <br> ".
                "  <br>Ticket number:<h2 style='text-align: center'>$ticketNo</h2><br> ".
                " <br>Thank You. <br> visit <a href='https://smileplanetef.org'>www.smileplanetef.org</a> for more information".
                "  call 07033461426, 08070920250. <br>"." For enquiries on how to be part as Partners, Sponsors, Volunteers, Tickets".
                " or for your Product exhibition & STANDS for sales in the CONFERENCE kindly call 07033461426,07032998069";
        }

        $check = Eventreg::where('email', $eml)->where('program_id', $eid)->first();

        if(count($check)>0){
            return back()->withErrors(array('message' => "Oops! You have already registered for this event!"));
        }

        $hear = $request->hearhow;
        $nhear = '';
        if(!empty($hear)){
            foreach ($hear as $key=>$value) {
                if($key+1 === count($hear)){
                    $nhear = $nhear . $value;
                }else{
                    $nhear = $nhear . $value . '_';
                }
            }
        }


        $data['hearhow'] = $nhear;
        $data['status'] = 'inactive';
        $data['ticket'] = $ticketNo;

        $regmsg = "Your ticket code for this event will  be sent to your registered phone number or email within 48 hours. ".
        "Thank you for expressing your interest for this event.".
            " Please check your spam folder in email if not found. ".
            " For enquiries on how to be part as Partners, Sponsors, Volunteers, Tickets ".
            " or for your Product exhibition & STANDS for sales in the CONFERENCE kindly call 07033461426,07032998069.";
        if(Eventreg::create($data)){

            //send email

            if($event->ticket==='yes'){
                $object = [
                    'email'=>$eml,
                    'title'=>$event->title,
                    'content'=>$message,
                    'subject'=>'Event Registration Ticket Notice.'
                ];
                Mailus::mailler($object);
//                $this->senddMail($eml, $event->title, $message);
            }

            return redirect(route('event_reg.success',$regmsg));
        }

        else
            return back()->withErrors(array('message' => "Oops! Something went wrong. Try gain later"));
    }

    public function ticketter(){
        $count = count(Eventreg::all());
        $charset = 'A9BC1DEF2GHI3JKL4MNO5PQR6STU7VWX8YZ0';
        $saltLen = 7;
        $randSalt = "";
        for ($i = 0; $i < $saltLen; $i++){
            $randSalt .= $charset[mt_rand(0, strlen($charset) - 1)];
        }

        return $randSalt.$count;
    }


    public function registercourse(Request $request){
        $data = $request->all();
        $data['status'] = 'inactive';

        if(Coursereg::create($data))
            return redirect(route('courseregsuc','Registration Success'));
        else
            return back()->withErrors(array('message' => "Oops! Something went wrong. Try gain later"));
    }

    public function coursesuccess($message){
        if(!empty($message))
            return view('entrepreneur.pages.course_reg_success')->withMessage($message);
        else
            return view('errors.404');
    }

    public function eventsuccess($transmission){
        if(!empty($transmission))
            return view('entrepreneur.pages.event_reg_success')->with('transmission', $transmission);
        else
            return view('errors.404');
    }

    public function senddMail($email, $subject, $message){



//                send mail to user
        $fromMail = 'SmilePlanetEF <no-reply@smileplanetef.org> ';
        $boundary = str_replace(" ", "", date('l jS \of F Y h i s A'));

        $to = $email;



        $htmlContent = "
                    <html>
                        <head>
                            <style>
                                html, body{
                                    background-color: #eeeeee;
                                    color: #333;
                                    font-family: sans-serif;
                                    font-weight: 100;
                                    margin: 0;
                                }
                            </style>
                        </head>
                        <body>
                           
                            <table cellspacing='0' style=' width: 100%; height: 200px;'>

                                <tr style='background-color: #511650;'>
                                    <th colspan='2' style='padding: 0 20px;'><span style='font-size: 20px; color: #dedede'>SMILE PLANET ENTREPRENEUR FOUNDATION</span></th>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <p style='text-align: center;padding: 0 50px; margin-bottom:  50px;'>$message</p>
                                        <hr>
                                        
                                    </td>
                                </tr>

                            </table>
                        </body>
                    </html>";

        //new no spam settings

        $headersMail = '';
        $headersMail .= "Reply-To:" . $fromMail . "\r\n";
        $headersMail .= "Return-Path: ". $fromMail ."\r\n";
        $headersMail .= 'From: ' . $fromMail . "\r\n";
        $headersMail .= "Organization: Smile Planet EF \r\n";
        $headersMail .= 'Return-Path: ' . $fromMail . "\r\n";
        $headersMail .= 'MIME-Version: 1.0' . "\r\n";
//        $headersMail .= "Content-Type: multipart/alternative; boundary = \"" . $boundary . "\"\r\n\r\n";
//        $headersMail .= '--' . $boundary . "\r\n";

        $headersMail .= "X-Priority: 3\r\n";
        $headersMail .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headersMail .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
        $headersMail .= 'Content-Transfer-Encoding: base64' . "\r\n\r\n";
//        $headersMail .= rtrim(chunk_split(base64_encode($htmlContent)));

        // Additional headers
//        $nheaders .= 'Cc: welcome@example.com' . "\r\n";
//        $nheaders .= 'Bcc: welcome2@example.com' . "\r\n";


        // Send email

        $msg = "Thank you for applying to volunteer with Smile Planet Foundation (SPF).
        You will receive an automated email . An email has been sent to " . $email ." with 
        confirmation of your application for verification. We will respond via phone and/or email 
        within a week of validating your application. Thank you.";

        mail($to,$subject,$htmlContent, $headersMail);

//        return view('pages.success.volunteercomplete')->with('email', $email);

    }



}
