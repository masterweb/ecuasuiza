<h4>Chat en Línea Ecuasuiza</h4>
<div id='chat'></div>
<?php
$this->widget('YiiChatWidget', array(
    'chat_id' => '123', // a chat identificator
    'identity' => 'Service', // the user, Yii::app()->user->id ?
    'selector' => '#chat', // were it will be inserted
    'minPostLen' => 2, // min and
    'maxPostLen' => 100, // max string size for post
    'model'=>new ChatHandler(), // the class handler.
    //'model'=>new MyYiiChatHandler(),  // the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
    'data' => 'any data', // data passed to the handler
    // success and error handlers, both optionals.
    'onSuccess' => new CJavaScriptExpression(
            "function(code, text, post_id){   }"),
    'onError' => new CJavaScriptExpression(
            "function(errorcode, info){  }"),
));
?>
