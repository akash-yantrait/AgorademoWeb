<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://download.agora.io/edu-apaas/release/edu_sdk@2.6.1.bundle.js"></script>
  
</head>
<body>
    <style>
        #root {
            width: 100%;
            height: 100%;
        }
    </style>
    <div id="root"></div>
<script type="text/javascript">
$( document ).ready(function() {
 AgoraEduSDK.config({
            appId: "{{$returnData['agora_app_identifier']}}",
        });
        AgoraEduSDK.launch(document.querySelector('#root'), {
            userUuid: "{{$returnData['userUuid']}}",
            userName: "{{$returnData['userName']}}",
            roomUuid:  "{{$returnData['roomUuid']}}",
            roleType: {{$returnData['roleType']}}, 
            roomType: {{$returnData['roomType']}},
            roomName: "{{$returnData['roomName']}}",
            pretest: true,
            rtmToken: "{{$returnData['agora_rtm_token']}}",
            language: 'en',
            duration: 60 * 30,
            courseWareList: [],
            listener: (evt, args) => {
            },
        }).catch((e) => {
            console.error('fail to launch', e);
        });
});

var mainRoomId = "{{$returnData['roomUuid']}}";
console.log('Room UID: '+mainRoomId);
var ConsoleroomName ="{{$returnData['roomName']}}";
console.log('Room Name: '+ConsoleroomName);
</script>
</body>
</html>