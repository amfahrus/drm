<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
	'name' => 'e-Procurement',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
      'workflow' => [
          'class' => 'cornernote\workflow\manager\Module',
      ],
  		'admin' => [
              'class' => 'mdm\admin\Module',
      ],
    ],
    'components' => [
      'workflowSource' => [
          'class' => 'cornernote\workflow\manager\components\WorkflowDbSource',
      ],
      'i18n' => [
          'translations' => [
              'workflow*' => [
                  'class' => 'yii\i18n\PhpMessageSource',
                  //'basePath' => '@app/messages',
                  //'sourceLanguage' => 'en-US',
                  /*'fileMap' => [
                      'app' => 'app.php',
                      'app/error' => 'error.php',
                  ],*/
              ],
          ],
      ],
      'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'viewPath' => '@backend/mail',
        'useFileTransport' => false,//set this property to false to send mails to real email addresses
        //comment the following array to send mail using php's mail function
        'transport' => [
              'class' => 'Swift_SmtpTransport',
              'host' => 'webmail.brantas-abipraya.co.id',
              'username' => 'amfahrus@brantas-abipraya.co.id',
              'password' => '1234567',
              'port' => '587',
              'encryption' => 'tls',
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            //'parsers' => ['application/json' => 'yii\web\JsonParser',],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
			'bundles' => [
				'dmstr\web\AdminLteAsset' => [
					'skin' => 'skin-blue',
				],
			],
		],
       	'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ],

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            //'country/*',
            //'admin/*',
            //'gii/*',
            //'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    'params' => $params,
];
