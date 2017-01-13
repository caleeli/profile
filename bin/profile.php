#!/usr/local/bin/php
<?php
require_once __DIR__ . '/../vendor/autoload.php';


//////////////////////////////////////////

class MyEvents1 extends AllEvents
{
    /**
     * This is a list of all current events. Uncomment the ones you wish to listen to.
     * Every event that is uncommented - should then have a function below.
     *
     * @var array
     */
    public $activeEvents = [
//        'onClose',
//        'onCodeRegister',
//        'onCodeRegisterFailed',
//        'onCodeRequest',
//        'onCodeRequestFailed',
//        'onCodeRequestFailedTooRecent',
        'onConnect',
//        'onConnectError',
//        'onCredentialsBad',
//        'onCredentialsGood',
        'onDisconnect',
//        'onDissectPhone',
//        'onDissectPhoneFailed',
//        'onGetAudio',
//        'onGetBroadcastLists',
//        'onGetError',
//        'onGetExtendAccount',
        'onGetGroupMessage',
//        'onGetGroupParticipants',
//        'onGetGroups',
//        'onGetGroupsInfo',
//        'onGetGroupsSubject',
//        'onGetImage',
//        'onGetLocation',
        'onGetMessage',
//        'onGetNormalizedJid',
//        'onGetPrivacyBlockedList',
//        'onGetProfilePicture',
//        'onGetReceipt',
//        'onGetServerProperties',
//        'onGetServicePricing',
//        'onGetStatus',
//        'onGetSyncResult',
//        'onGetVideo',
//        'onGetvCard',
//        'onGroupCreate',
//        'onGroupisCreated',
//        'onGroupsChatCreate',
//        'onGroupsChatEnd',
//        'onGroupsParticipantsAdd',
//        'onGroupsParticipantsPromote',
//        'onGroupsParticipantsRemove',
//        'onLoginFailed',
//        'onLoginSuccess',
//        'onAccountExpired',
//        'onMediaMessageSent',
//        'onMediaUploadFailed',
//        'onMessageComposing',
//        'onMessagePaused',
//        'onMessageReceivedClient',
//        'onMessageReceivedServer',
//        'onPaidAccount',
//        'onPing',
//        'onPresenceAvailable',
//        'onPresenceUnavailable',
//        'onProfilePictureChanged',
//        'onProfilePictureDeleted',
//        'onSendMessage',
//        'onSendMessageReceived',
//        'onSendPong',
//        'onSendPresence',
//        'onSendStatusUpdate',
//        'onStreamError',
//        'onUploadFile',
//        'onUploadFileFailed',
    ];

    public function onConnect($mynumber, $socket)
    {
        echo "WOOOOOOHoo!, Phone number $mynumber connected successfully!\n";
        /*global $w;
        $target = '59170661682'; // The number of the person you are sending the message
        $message = 'Hi! :) this is a test message';
        echo "sending message...";
        $w->sendMessage($target , $message);
        echo "message sent!!!";*/
    }

    public function onDisconnect($mynumber, $socket)
    {
        echo "<p>Booo!, Phone number $mynumber is disconnected!</p>";
    }

    public function onGetGroupMessage($mynumber, $from_group_jid,
                                      $from_user_jid, $id, $type, $time, $name,
                                      $body)
    {
        parent::onGetGroupMessage($mynumber, $from_group_jid, $from_user_jid,
                                  $id, $type, $time, $name, $body);
        var_dump($mynumber, $from_group_jid, $from_user_jid,
                                  $id, $type, $time, $name, $body);

    }

    public function onGetMessage($mynumber, $from, $id, $type, $time, $name,
                                 $body)
    {
        parent::onGetMessage($mynumber, $from, $id, $type, $time, $name, $body);
        var_dump($mynumber, $from, $id, $type, $time, $name,
                                 $body);
    }
}

////////////////

$username = "59169731696";
$debug = false;

////REGISTRO

/*
// Create a instance of Registration class.
$r = new Registration($username, $debug);
$r->codeRequest('sms'); // could be 'voice' too
//$r->codeRequest('voice');
die;
*/
/*
$r = new Registration($username, $debug);
$code = '878950';
$res = $r->codeRegister($code);
var_dump($res);
die;
*/

$password = '2fShoITSKVax1v/RagQXsuFUl5A=';

$nickname = "Preguntados";

global $w;

// Create a instance of WhastPort.
$w = new WhatsProt($username, $nickname, $debug);

//$events = new MyEvents1($w);
//$events->setEventsToListenFor($events->activeEvents); //You can also pass in your own array with a list of events to listen too instead.
        
//Now continue with your script.
$w->connect();
$w->loginWithPassword($password);

echo "COOL!!!";