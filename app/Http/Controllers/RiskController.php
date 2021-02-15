<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Control;
use App\Models\Rccontrol;
use App\Models\Rctag;
use App\Models\Relation;
use App\Models\RiskControl;
use App\Models\Tag;
use App\Models\Testingstep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiskController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function create(){
        $controls = Control::where('status','1')->where('parent_id','=',null)->with('parent')->with('children')->withCount('followers')->get();
        $bookmarks = Bookmark::where('user_id',Auth::id())->with('rcs')->paginate(2);
        $tags = Tag::where('status','1')->with('user')->get();
        return view('user.rc.create',compact('controls','tags','bookmarks'));
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            'title'=>'required',
            // 'obj_summary'=>'required',
            'obj'=>'required',
            'desc'=>'required',
        ],
        [
            // 'obj_summary.required'=>'Objective summary is required',
            'obj.required'=>'Objective is required for risk control',
            'desc.required'=>'Description is required',
        ]);

        //dd($request);

        //$slug = SlugService::createSlug(Post::class, 'slug', 'My First Post');

        if(Auth::user()->rc_status == '1'){
            $status = 'A';
        }else{
            $status = 'P';
        }
        $data = array(
            'title'=>$request->input('title'),
            // 'obj_summary'=>$request->input('obj_summary'),
            'objective'=>$request->input('obj'),
            'description'=>$request->input('desc'),
            'frequency'=>$request->input('frequency'),
            'implementation_type'=>$request->input('imp_type'),
            'business_impact'=>$request->input('business_impact'),
            //'recommendation'=>$request->input('recommendation'),
            'status'=>$status,
            'is_comment_disabled'=>'0',
            'user_id'=>Auth::id(),

        );
        //

        $rc = RiskControl::create($data);
        if($rc){
            $o=1;
            if($request->input('testing_steps')){
            foreach($request->input('testing_steps') as $ts){

                $testingStep = new Testingstep;
                $testingStep->step = $ts;
                $testingStep->order = $o;
                $testingStep->rc()->associate($rc);
                $testingStep->save();
                $o++;
            }
        }

        //Addin Industry here
        if($request->input('industry')){
            foreach($request->input('industry') as $ind){
                $industry = Control::find($ind);
                $rccontrol = new Rccontrol;
                $rccontrol->type = 'industry';
                $rccontrol->rc()->associate($rc);
                $rccontrol->control()->associate($industry);
                $rccontrol->save();
            }
        }

        if($request->input('process')){
            foreach($request->input('process') as $pro){
                $process = Control::find($pro);
                $rccontrol = new Rccontrol;
                $rccontrol->type = 'bprocess';
                $rccontrol->rc()->associate($rc);
                $rccontrol->control()->associate($process);
                $rccontrol->save();
               
            }
        }

        if($request->input('framework')){
            foreach($request->input('framework') as $fr){
                $framework = Control::find($fr);
                $rccontrol = new Rccontrol;
                $rccontrol->type = 'bframework';
                $rccontrol->rc()->associate($rc);
                $rccontrol->control()->associate($framework);
                $rccontrol->save();
            }
        }

            // if($request->input('relations')){
            //     foreach($request->input('relations') as $rel){
            //         $relationControl = RiskControl::find($rel);
            //         $relation = new Relation;
            //         $relation->rc()->associate($rc);;
            //         $relation->relation()->associate($relationControl);
            //         $relation->save();
            //     }
            // }

            if($request->input('tags')){
            foreach($request->input('tags') as $tg){
                if(Tag::where('id',$tg)->first()){
                    $ta = Tag::find($tg);
                    $rctag = new Rctag;
                    $rctag->rc()->associate($rc);
                    $rctag->tag()->associate($ta);
                    $rctag->save();
                }else{
                    $ntg= array(
                        'name'=>$tg,
                        'user_id'=>Auth::id(),
                        'status'=>'1',
                        'is_recommended'=>'1',
                    );
                    $tag = Tag::create($ntg);
                    $rctag = new Rctag;
                    $rctag->rc()->associate($rc);
                    $rctag->tag()->associate($tag);
                    $rctag->save();
                }
            }
        }

            if($rc){
                $request->session()->flash('success','Risk control created successfully');
            }else{
                $request->session()->flash('error','Unable to create risk control. Try again later.');
                 }
        }else{
            $request->session()->flash('error','Unable to create risk control. Try again later.');
        }

        return redirect()->route('rc.create');
        
        //dd($validator);
        


    }

    public function show($slug, Request $request){
        $rc = RiskControl::where('id',$slug)->where('user_id',Auth::id())->get()->first();
        if($rc){
            return view('user.rc.view',compact('rc'));
        }else{
            $request->session()->flash('error','Unable to load requested url');
            return back();
        }
    }

    public function edit(RiskControl $riskcontrol){
        $rc = $riskcontrol;
        if($rc->user_id == Auth::id()){
            $controls = Control::where('status','1')->with('parent')->with('followers')->get();
            $bookmarks = Bookmark::where('user_id',Auth::id())->with('rcs')->paginate(2);
            $tags = Tag::where('status','1')->with('user')->get();
            return view('user.rc.edit',compact('controls','tags','rc','bookmarks'));
        }else{
            abort(404);
        }
        
    }

    public function update(Riskcontrol $riskcontrol,Request $request){
        $validated = $request->validate([
            'title'=>'required',
            // 'obj_summary'=>'required',
            'obj'=>'required',
            'desc'=>'required',
        ],
        [
            // 'obj_summary.required'=>'Objective summary is required',
            'obj.required'=>'Objective is required for risk control',
            'desc.required'=>'Description is required',
        ]);
        
        //dd($request);
        //$slug = SlugService::createSlug(Post::class, 'slug', 'My First Post');

        $data = array(
            'title'=>$request->input('title'),
            // 'obj_summary'=>$request->input('obj_summary'),
            'objective'=>$request->input('obj'),
            'description'=>$request->input('desc'),
            'frequency'=>$request->input('frequency'),
            'implementation_type'=>$request->input('imp_type'),
            'business_impact'=>$request->input('business_impact'),
            //'recommendation'=>$request->input('recommendation'),
            'status'=>$riskcontrol->status,
            'is_comment_disabled'=>$riskcontrol->is_comment_disabled,
            'user_id'=>Auth::id(),

        );
        //

        $rc = $riskcontrol->update($data);
        //dd($rc);
        if($rc){
            $o=1;
            $tSteps = TestingStep::select('id')->where('rc_id',$riskcontrol->id)->get()->toArray();
            TestingStep::destroy($tSteps);

            //Updating testing steps here
            if($request->input('testing_steps')){
                foreach($request->input('testing_steps') as $ts){

                    $testingStep = new Testingstep;
                    $testingStep->step = $ts;
                    $testingStep->order = $o;
                    $testingStep->rc()->associate($riskcontrol);
                    $testingStep->save();
                    $o++;
                }
            }
        
            //Updating industry here
            $rcIds = Rccontrol::select('id')->where('rc_id',$riskcontrol->id)->where('type','industry')->whereNotIn('control_id',[$request->input('industry')])->get()->toArray();
            Rccontrol::destroy($rcIds);
            foreach($request->input('industry') as $ind){
                $industry = Control::find($ind);
                Rccontrol::updateOrCreate(
                    ['rc_id'=>$riskcontrol->id,'control_id'=>$ind,'type'=>'industry'],
                    ['rc_id'=>$riskcontrol->id,'control_id'=>$ind]
                );
            }


            //Updating business process here
            if($request->input('process')){
                $rcIds = Rccontrol::select('id')->where('rc_id',$riskcontrol->id)->where('type','bprocess')->whereNotIn('control_id',[$request->input('process')])->get()->toArray();
            }else{
                $rcIds = Rccontrol::select('id')->where('rc_id',$riskcontrol->id)->where('type','bprocess')->get()->toArray();
            }
            
            Rccontrol::destroy($rcIds);
            if($request->input('process')){
                foreach($request->input('process') as $pro){
                    $process = Control::find($pro);
                    Rccontrol::updateOrCreate(
                        ['rc_id'=>$riskcontrol->id,'control_id'=>$process->id,'type'=>'bprocess'],
                        ['rc_id'=>$riskcontrol->id,'control_id'=>$process->id]
                    );
                }
            }


            //Updating business framework here
            if($request->input('framework')){
                $rcIds = Rccontrol::select('id')->where('rc_id',$riskcontrol->id)->where('type','bframework')->whereNotIn('control_id',[$request->input('framework')])->get()->toArray();
            }else{
                $rcIds = Rccontrol::select('id')->where('rc_id',$riskcontrol->id)->where('type','bframework')->get()->toArray();
            }
            Rccontrol::destroy($rcIds);
            if($request->input('framework')){
            foreach($request->input('framework') as $fr){
                $framework = Control::find($fr);
                Rccontrol::updateOrCreate(
                    ['rc_id'=>$riskcontrol->id,'control_id'=>$framework->id,'type'=>'bframework'],
                    ['rc_id'=>$riskcontrol->id,'control_id'=>$framework->id]
                );
            }
            }                                                                              

            
            // if($request->input('relations')){
            // $relationIds = Relation::select('id')->where('rc_id',$riskcontrol->id)->whereNotIn('relation_id',$request->input('relations'))->get()->toArray();
            // Relation::destroy($relationIds);
            
            //     foreach($request->input('relations') as $rel){
            //         $relationControl = RiskControl::find($rel);
            //     Relation::updateOrCreate(
            //         ['rc_id'=>$riskcontrol->id,'relation_id'=>$relationControl->id],
            //         ['rc_id'=>$riskcontrol->id,'relation_id'=>$relationControl->id]
            //     );
                    
            //     }
            // }

            //Deleting all old tags association and creating new one
            if($request->input('tags')){
                $tagIds = Rctag::select('id')->where('rc_id',$riskcontrol->id)->whereNotIn('tag_id',[$request->input('tags')])->get()->toArray();
            }else{
                $tagIds = Rctag::select('id')->where('rc_id',$riskcontrol->id)->get()->toArray();
            }
            Rctag::destroy($tagIds);

            if($request->input('tags')){
            foreach($request->input('tags') as $tg){
                if(Tag::where('id',$tg)->first()){

                    $ta = Tag::find($tg);
                    $rctag = Rctag::updateOrCreate(
                        ['rc_id'=>$riskcontrol->id,'tag_id'=>$ta->id],
                        ['rc_id'=>$riskcontrol->id,'tag_id'=>$ta->id]
                    );
                    
                }else{
                    $ntg= array(
                        'name'=>$tg,
                        'user_id'=>Auth::id(),
                        'status'=>'1',
                        'is_recommended'=>'1',
                    );
                    $tag = Tag::create($ntg);
                    $rctag = new Rctag;
                    $rctag->rc()->associate($riskcontrol);
                    $rctag->tag()->associate($tag);
                    $rctag->save();
                }
            }
        }

            if($rc){
                $request->session()->flash('success','Risk control updated successfully');
            }else{
                $request->session()->flash('error','Unable to update risk control. Try again later.');
                 }
        }else{
            $request->session()->flash('error','Unable to update risk control. Try again later.');
        }

        return redirect()->route('rc.edit',$riskcontrol);
    }

    public function viewAll(Request $request){
    if(!isset($request->rcs)){
        $rcs = RiskControl::orderBy('created_at','desc')->whereNotIn('status',['P','R'])->paginate(10);
    }elseif(isset($request->rcs) && filter_var($request->rcs, FILTER_VALIDATE_INT) !== FALSE){
        $rcs = RiskControl::orderBy('created_at','desc')->whereNotIn('status',['P','R'])->paginate($request->rcs);
    }else{
        $rcs = RiskControl::orderBy('created_at','desc')->whereNotIn('status',['P','R'])->paginate(10);
    }
      
       return view('user.rc.allRcs',compact('rcs'));
    }

    public function fetchAllRcs(){
        $rcs = RiskControl::paginate(7);
        return view('user.sections.riskcontrols',compact('rcs'))->render();
     }

    public function viewSpecific($slug=null,Request $request){
        $rc = RiskControl::where('id',$slug)->with('controls.control.parent')->with('benchmarks.user')->with('comments.user')->with('tags.tag')->get()->first();
        $expiresAt = now()->addHours(10);

        
        if($rc){
            views($rc)
            ->cooldown($expiresAt)
            ->record();
            return view('user.rc.viewSpecific',compact('rc'));
        }else{
            $request->session()->flash('error','Unable to load requested url');
            return back();
        }
    }

    public function fetchBookmarks(Request $request){
        if($request->ajax())
        {
            $bookmarks = Bookmark::where('user_id',Auth::id())->with('rcs')->paginate(2);
            //dd($rcs);
            return view('user.sections.relationRcs', compact('bookmarks'))->render();
        }
    }

    public function fetchBookmarksEdit(Request $request){
        if($request->ajax())
        {
            $bookmarks = Bookmark::where('user_id',Auth::id())->with('rcs')->paginate(2);
            //dd($rcs);
            return view('user.sections.editRelationRcs', compact('bookmarks'))->render();
        }
    }

    public function createComment(Request $request,RiskControl $riskcontrol){
        $request->validate([
            'comment'=>'required'
        ]);

        $data = array(
            'rc_id'=>$riskcontrol->id,
            'user_id'=>Auth::id(),
            'comment'=>$request->input('comment'),
        );

        $com = Comment::create($data);

        if($com){
            $request->session()->flash('success','Comment posted successfully');
        }else{
            $request->session()->flash('error','Unable to post comment. Try again later.');
             }
        return redirect('/rc/'.$riskcontrol->id.'/#allComments');
    }

    public function deleteComment(Request $request,Comment $comment,RiskControl $rc){
        $com = Comment::where('id',$comment->id)->where('user_id',Auth::id())->delete();
        if($com){
            $request->session()->flash('success','Comment deleted successfully');
        }else{
            $request->session()->flash('error','Unable to delete comment. Try again later.');
             }
        return redirect('/rc/'.$rc->id.'/#allComments');
    }

    public function searchQuery(Request $request){
       $search = $request->search;
       if(!empty($search)){
       $rcs = RiskControl::where('title', 'like', '%'.$search.'%')->whereNotIn('status',['P','R'])->orWhere('description', 'like', '%'.$search.'%')->paginate(10);
       if($rcs){
        return view('user.rc.searchResults',compact('rcs','search'));
        }else{
            $request->session()->flash('error','No results to show');
            return back();
         }
       
       }else{
        $request->session()->flash('error','Nothing to show.');
       }
       return back();


    
    }

    public function filterResults(Request $request){
       //dd($request);
        $riskcontrols = RiskControl::query();

        if($request->get('type')){
            if($request->get('control')){
               $riskcontrols->whereHas('controls', function ($query) use($request){
                $query->where('type',$request->get('type'))->where('control_id',$request->get('control'));
            });
            }
        }

       
           

        if($request->input('stype')=='date'){
           $riskcontrols->whereNotIn('status',['R'])->orderBy('created_at',$request->input('order'));
        }elseif($request->input('stype')=='views'){
            $riskcontrols->whereNotIn('status',['R'])->orderByViews($request->input('order'));
        }elseif($request->input('stype')=='rating'){
            $riskcontrols->whereNotIn('status',['R'])->withCount('ratings')->orderBy('ratings_count',$request->input('order'));
        }elseif($request->input('stype')=='likes'){
            $riskcontrols->whereNotIn('status',['R'])->withCount('likes')->orderBy('likes_count',$request->input('order'));
        }


        
        if($request->get('startDate') && $request->get('endDate') && ($request->get('startDate') <= $request->get('endDate'))){
            if($request->get('startDate') == $request->get('endDate')){
                $riskcontrols->whereDate('created_at','=',$request->get('startDate'));
            }else{
                $riskcontrols->whereBetween('created_at',[$request->get('startDate'),$request->get('endDate')]);
            }
        }
        if($request->get('status')){
            $riskcontrols->where('status','=',$request->get('status'));
        }



        $rcs = $riskcontrols->paginate(10);

        if($rcs){
            return view('user.rc.searchResults',compact('rcs'));
            }else{
                $request->session()->flash('error','No results to show');
                return back();
             }
           


    }

   

    
}
