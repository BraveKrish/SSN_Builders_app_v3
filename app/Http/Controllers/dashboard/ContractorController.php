<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SubcontractorProposal;
use Illuminate\Http\Request;
use App\Traits\FileTraits;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContractorController extends Controller
{
    use FileTraits;
    public function show($id)
    {
        // dd($id);
        $files = ProjectFile::where('project_id', $id)->get();
        $openStatus = Project::where('id', $id)->value('open_for_contractors');
        // dd($openStatus);

        foreach ($files as $file) {
            $file->file_path = $this->image_path($file->file_path);
        }
        return view('Dashboard.contractor.show', compact('id', 'files','openStatus'));
    }

    // open for contrator status in project tab
    public function openForContractor(Request $request){
        // dd($request->all());
        try{
            $project = Project::findOrFail($request->project_id);
            // dd($project->toArray());
            $openStatus = $project->open_for_contractors;
            // dd($openSatus);
            if ($openStatus == 0) {
                $project->open_for_contractors = 1;
                $project->save();
                return redirect()->back()->with('success', 'Project is now opened for contractors.');
            } else {
                return redirect()->back()->with('error', 'Project is already opened for contractors.');
            }

            return redirect()->route('contractor.show')->with(['success' => 'Project opened for Contractors']);

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    // contractors proposal
    public function proposalIndex()
    {
        $proposals = SubcontractorProposal::with('project')->with('subcontractor')->get();
        // dd($proposals->toArray());
        return view('Dashboard.subcontractors.proposal', compact('proposals'));
    }

    public function proposalReview($id)
    {
        $proposal = SubcontractorProposal::with('project')->with('subcontractor')->where('id', $id)->first();
        $status = SubcontractorProposal::STATUS;
        $category = ServiceCategory::where('id',$proposal->project->category_id)->first();
        // dd($category);

        if ($proposal->status == 'submitted') {
            $proposal->status = 'under_review';
            $proposal->save();
        }

        // dd($proposal->toArray());
        // dd($proposal->toArray());
        return view('Dashboard.subcontractors.proposal_review', compact('proposal','status','category'));
    }
    
    public function updateBidStatus(Request $request){
        // dd($request->all());
        try{
            $proposal = SubcontractorProposal::findOrFail($request->id);
            if ($proposal->status === 'accepted') {
                return redirect()->back()->with('error', 'Proposal Bid is already Approved and cannot be changed!');
            }
    
            $proposal->status = $request->status;
            $proposal->save();
    
            $message = $request->status === 'accepted' 
                ? 'Proposal Bid has been Approved!' 
                : 'Proposal Bid status updated successfully!';
    
            return redirect()->back()->with('success', $message);

        
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Proposal not found!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }


    public function acceptBid(Request $request){
        // dd($request->all());
        $proposal = SubcontractorProposal::findOrFail($request->bid_id);
        // dd($proposal->toArray());
        if($proposal->status != 'accepted'){
            $proposal->status = 'accepted';
            $proposal->save();
            return redirect()->back()->with('success', 'Proposal Bid for subcontractor is Approved!!');
        }elseif($proposal->status == 'accepted'){
            return redirect()->back()->with('success', 'Proposal Bid for subcontractor is Aleready Approved!!');
        }
        else{
            return redirect()->back()->with('error', 'Please Review the Bid onceand procced for Approval!!');
        }
    }

    public function destroyProposal($id){
        try {
            $proposal = SubcontractorProposal::findOrFail($id);
            $this->deleteImage($proposal->image_path);
            $proposal->delete();
            return redirect()->route('contractors.proposal')->with('success', 'Proposal deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Project not found']);
        }
    }
}
