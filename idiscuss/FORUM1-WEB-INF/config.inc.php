<?php
$DB_TYPE     = "mysql";
$DB_NAME     = "idiscuss";
$DB_HOST     = "localhost";
$DB_USERNAME = "rupam";
$DB_PASSWORD = "rupam";
$CHARSET     = "utf8mb4";
$PHPINI		 = "C:/xampp/php/php.ini";

$HTDOCS_URL  = "http://localhost";
$JS_URL      = $HTDOCS_URL."/js";
$CSS_URL     = $HTDOCS_URL."/css";
$IMG_URL     = $HTDOCS_URL."/img";

$HTDOCS_PATH = "C:/xampp/htdocs";
$CSS_PATH    = $HTDOCS_PATH."/css";
$IMG_PATH    = $HTDOCS_PATH."/img";
$FONTS_PATH  = $HTDOCS_PATH."/fonts";
$TTF_PATH    = $HTDOCS_PATH."/captcha/NomosInlineGrunge.ttf";

$SITE_NAME_STYLE = "iDiscuss";
$SITE_NAME       = "idiscuss";
$FORUM_PATH      = $HTDOCS_PATH."/".$SITE_NAME;
$APP_PATH        = $HTDOCS_PATH."/".$SITE_NAME."/FORUM1-WEB-INF";
$CLASS_PATH      = $APP_PATH."/class";
$TPL_PATH        = $APP_PATH."/tpl";
$LANG_PATH       = $APP_PATH."/lang";
$HOSTNAME_URL    = $HTDOCS_URL."/".$SITE_NAME;              //http://localhost/idiscuss

$NUM_THREAD_PER_PAGE  = 3;
$NUM_COMMENT_PER_PAGE = 3;

$BOOTSTRAP_PATH       = $HTDOCS_PATH."/bootstrap";
$BOOTSTRAP_PATH_CSS   = $BOOTSTRAP_PATH."/css";
$BOOTSTRAP_CSS_URL    = $HTDOCS_URL."/bootstrap-5.1.3-dist/css/bootstrap.min.css";
$BOOTSTRAP_JS_URL     = $HTDOCS_URL."/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js";

//google captcha
$G_CAPTCHA_CLIENT_KEY = "6Leg36seAAAAAM8r-xr3yLDUY3t6N359x_bWUvaj";
$G_CAPTCHA_SECRET_KEY = "6Leg36seAAAAALXB5dSRNuMysdFNPIkvS7TRR9hY";
$G_CAPTCHA_JS         = "https://www.google.com/recaptcha/api.js";
$G_CAPTCHA_API_URL    = "https://www.google.com/recaptcha/api/siteverify?";

$WHATSAPP_NUM = '917555430191';
define("DEFAULT_LANG", "en-us");
$LANG_LIST = ['English'=>'en-us','Hindi'=>'hi'];
?>