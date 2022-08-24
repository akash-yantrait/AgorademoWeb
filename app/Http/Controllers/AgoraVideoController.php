<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\Message;
use Illuminate\Support\Str;
use App\Classes\AgoraDynamicKey\AccessToken;

class AgoraVideoController extends Controller
{
    const RoleRtmUser = 1;
    public function buildToken($appID, $appCertificate, $userAccount, $role, $privilegeExpireTs){
        $token = AccessToken::init($appID, $appCertificate, $userAccount, "");
        $Privileges = AccessToken::Privileges;
        $token->addPrivilege($Privileges["kRtmLogin"], $privilegeExpireTs);
        return $token->build();
    }
    
    public function mainSubmit(Request $request){
        $returnData['agora_app_identifier']=env('agora_app_id');
            $returnData['agora_region']=env('agora_region');
            $returnData['userUuid']=Str::random(50);
            $returnData['userName']=Str::random(10);
            $returnData['roomType']=0;
        if($request->submitButton =='Create'){
            $returnData['roomUuid']=Str::random(50);
            $returnData['roleType']=1;
            $returnData['roomName']='AkRoom';
            $returnData['agora_rtm_token']=$this->buildToken(env('agora_app_id'), env('agora_app_certificate'), $returnData['userUuid'], 1, 36000);
            return view('flexiRoom', compact('returnData'));
        }
        else if($request->submitButton =='Join'){
            $returnData['roomUuid']=$request->roomUUid;
            $returnData['roleType']=2;
            $returnData['roomName']=$request->userName;
            $returnData['agora_rtm_token']=$this->buildToken(env('agora_app_id'), env('agora_app_certificate'), $returnData['userUuid'], 1, 3600);
            return view('flexiRoom', compact('returnData'));
        }
    }
    
    public function home(Request $request){
        $returnData=null;
        return view('home', ['data' => $returnData]);
    }
}