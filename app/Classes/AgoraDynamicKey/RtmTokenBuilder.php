<?php
namespace App\Classes\AgoraDynamicKey;
require_once "AccessToken.php";


class RtcTokenBuilder
{
    const RoleRtmUser = 1;
    public static function buildToken($appID, $appCertificate, $userAccount, $role, $privilegeExpireTs){
        $token = AccessToken::init($appID, $appCertificate, $userAccount, "");
        $Privileges = AccessToken::Privileges;
        $token->addPrivilege($Privileges["kRtmLogin"], $privilegeExpireTs);
        return $token->build();
    }
}


?>