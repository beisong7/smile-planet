<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController as Mailus;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::orderBy('id', 'DESC')->paginate(8);

        return view('admin.pages.projects.index')
            ->with('programs', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newevent()
    {
        return view('admin.pages.projects.add');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $title = $data['title'];
        $count = Program::where('title',$title)->get();
        $data['dates'] = strtotime($data['date']);
        if(count($count) > 0){
            return back()->withErrors(array('message'=>'Sorry. This title is already used.'));
        }else{
            $data['status'] = 1;
            if(Program::create($data)){
                return redirect(route('console.event'))->withMessage('New Event Added Successfully');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('admin.pages.projects.edit')
            ->with('event', $program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Program $program,Request $request)
    {
        $data = $request->all();
        $data['dates'] = strtotime($data['date']);

//        return $data;

        if($program->update($data))
        {
            return back()->withMessage('Event updated Updated');
        }else{
            return back()->withErrors(array('message'=> 'Unable to complete, try again later'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        if($program->delete())
        {
            return back()->withMessage('Event Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=> 'Unable to complete, try again later'));
        }
    }

    public function mailresend(Program $program){


        foreach ($program->users as $user){

            $message = "Hi " . $user->fname . "! We received your registration to partake in our event which comes up on the "
                . date('F jS, Y', strtotime($program->date)) . " with the Theme <b>$program->title</b>. <br>".
                " You have received a Ticket Number. Please remember to come to the event with this Ticket Number for verification. <br> ".
                "  <br>Ticket number:<h2 style='text-align: center'>$user->ticket</h2><br> ".
                " <br>Thank You. <br> visit <a href='https://smileplanetef.org'>www.smileplanetef.org</a> for more information".
                "  call 07033461426, 08070920250. <br>"." For enquiries on how to be part as Partners, Sponsors, Volunteers, Tickets".
                " or for your Product exhibition & STANDS for sales in the CONFERENCE kindly call 07033461426,07032998069";


            $object = [
                'email'=>$user->email,
                'title'=>$program->title,
                'content'=>$message,
                'subject'=>'Event Registration Ticket Notice.'
            ];
            Mailus::mailler($object);
//                $this->senddMail($eml, $event->title, $message);

        }

        return $this->index();

    }

    public function custommail(Program $program){
        return view('admin.pages.projects.custom_mail')
            ->with('program', $program);
    }

    public function sendCustomMail(Request $request, Program $program){
        $data = $request->all();
        if(empty($data['semail'])){
            foreach ($program->users as $user){
                $object = [
                    'email'=>$user->email,
                    'title'=>$program->title,
                    'content'=>$data['content'],
                    'subject'=>$data['subject']
                ];
                Mailus::mailler($object);

            }
        }else{
            $object = [
                'email'=>$data['semail'],
                'title'=>$program->title,
                'content'=>$data['content'],
                'subject'=>$data['subject']
            ];
            Mailus::mailler($object);
        }
        return back()->withMessage('Email Sending Complete');
    }
}
