<?php header("Content-Type:text/html;charset=utf-8");?>
<?php
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {
    date_default_timezone_set('Asia/Tokyo');
}

$site_top = "http://hohoemi-aomori.com/";

$to = "syafuku-hohoemi@hohoemi-aomori.com";

$Email = "Email";

$Referer_check = 0;

$Referer_check_domain = "php-factory.net";

$userMail = 1;

$BccMail = "";

$subject = "お問い合わせ";

$confirmDsp = 1;

$jumpPage = 0;

$thanksPage = "http://hohoemi-aomori.com/";

$requireCheck = 1;

$require = array('お名前', 'Email', '内容');

$remail = 1;

$refrom_name = "社会福祉法人ほほえみ";

$re_subject = "送信ありがとうございました";

$dsp_name = 'お名前';

$remail_text = <<< TEXT

お問い合わせありがとうございました。
早急にご返信致しますので今しばらくお待ちください。

送信内容は以下になります。

TEXT;

$mailFooterDsp = 1;

$mailSignature = <<< FOOTER

──────────────────────
社会福祉法人ほほえみ
〒036-0162 青森県平川市館山前田80番地1
TEL：0172-44-0033 　FAX：0172-44-0034
E-mail:syafuku-hohoemi@hohoemi-aomori.com
URL: http://hohoemi-aomori.com/
──────────────────────

FOOTER;

$mail_check = 1;

$hankaku = 0;

$hankaku_array = array('電話番号', '金額');

$encode = "UTF-8";

if (isset($_GET)) {
    $_GET = sanitize($_GET);
}
if (isset($_POST)) {
    $_POST = sanitize($_POST);
}
if (isset($_COOKIE)) {
    $_COOKIE = sanitize($_COOKIE);
}
if ($encode == 'SJIS') {
    $_POST = sjisReplace($_POST, $encode);
}
$funcRefererCheck = refererCheck($Referer_check, $Referer_check_domain);

$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm = '';
$header = '';

if ($requireCheck == 1) {
    $requireResArray = requireCheck($require);
    $errm = $requireResArray['errm'];
    $empty_flag = $requireResArray['empty_flag'];
}

if (empty($errm)) {
    foreach ($_POST as $key => $val) {
        if ($val == "confirm_submit") {
            $sendmail = 1;
        }
        if ($key == $Email) {
            $post_mail = h($val);
        }
        if ($key == $Email && $mail_check == 1 && !empty($val)) {
            if (!checkMail($val)) {
                $errm .= "<p class=\"error_messe\">【" . $key . "】はメールアドレスの形式が正しくありません。</p>\n";
                $empty_flag = 1;
            }
        }
    }
}

if (($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1) {
    if ($remail == 1) {
        $userBody = mailToUser($_POST, $dsp_name, $remail_text, $mailFooterDsp, $mailSignature, $encode);
        $reheader = userHeader($refrom_name, $to, $encode);
        $re_subject = "=?iso-2022-jp?B?" . base64_encode(mb_convert_encoding($re_subject, "JIS", $encode)) . "?=";
    }

    $adminBody = mailToAdmin($_POST, $subject, $mailFooterDsp, $mailSignature, $encode, $confirmDsp);
    $header = adminHeader($userMail, $post_mail, $BccMail, $to);
    $subject = "=?iso-2022-jp?B?" . base64_encode(mb_convert_encoding($subject, "JIS", $encode)) . "?=";

    mail($to, $subject, $adminBody, $header);
    if ($remail == 1 && !empty($post_mail)) {
        mail($post_mail, $re_subject, $userBody, $reheader);
    }
} elseif ($confirmDsp == 1) {
    ?>
<!DOCTYPE html>
<html lang=ja>

<head>
  <!-- IE -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <!-- SEO -->
  <title>社会福祉法人ほほえみ-苦楽を共にして生きていく- | 青森県平川市</title>
  <meta name="keywords" content="社会福祉法人,ほほえみ,青森県,平川市,カリフラワー,おらんど,uniメゾン,アピール">
  <meta name="description" content="【社会福祉法人ほほえみ】思いをうまく伝えられなかったり 体が思うように動かなかったり 障がいが有るとか無いとか、そんなことよりも あなたが抱える、生活の中の 「不便さ」や「もどかしさ」を 解消していく それが私たちほほえみの仕事です。">
  <meta name="author" content="株式会社プラス">
  <link rel="canonical" href="http://hohoemi-aomori.com">
  <!-- OGP -->
  <meta property="og:site_name" content="社会福祉法人ほほえみ">
  <meta property="og:title" content="社会福祉法人ほほえみ-苦楽を共にして生きていく- | 青森県平川市">
  <meta property="og:description" content="【社会福祉法人ほほえみ】思いをうまく伝えられなかったり 体が思うように動かなかったり 障がいが有るとか無いとか、そんなことよりも あなたが抱える、生活の中の 「不便さ」や「もどかしさ」を 解消していく それが私たちほほえみの仕事です。">
  <meta property="og:type" content="website">
  <meta property="og:url" content="http://hohoemi-aomori.com">
  <meta property="og:image" content="http://hohoemi-aomori.com/images/logo.png">
  <meta property="fb:app_id" content="192837465091827" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="http://hohoemi-aomori.com">
  <meta name="twitter:image" content="http://hohoemi-aomori.com/images/logo.png">
  <!-- favicon -->
  <link rel="icon" href="favicon.ico">
  <!-- web clip -->
  <link rel="apple-touch-icon" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="57x57" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="72x72" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="76x76" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="114x114" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="120x120" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="144x144" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="152x152" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="180x180" href="http://hohoemi-aomori.com/images/logo.png">
  <!-- CSS dependencies -->
  <link rel="stylesheet" type="text/css" href="css/import.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
</head>
<body>

<div id="formWrap" class="parent" style="height:100vh;background:url('images/1-2.jpg') no-repeat; background-size:cover;">
<div class="bg-mask-2 parent text-white">
	<?php if ($empty_flag == 1) {
        ?>
	<h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
	<?php echo $errm; ?><br /><br /><input type="button" class="btn page-link text-dark d-inline-block" value=" 前画面に戻る " onClick="history.back()">
	<?php
    } else {
        ?>
			<h3>確認画面</h3>
			<p align="center">以下の内容で間違いがなければ、「送信する」ボタンを押してください。</p>
			<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="POST">
			<table class="table">
			<?php echo confirmOutput($_POST); ?>
			</table>
			<p align="center"><input type="hidden" name="mail_set" value="confirm_submit">
			<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']); ?>">
			<input type="submit" class="btn page-link text-dark d-inline-block" value="　送信する　">
			<input type="button" class="btn page-link text-dark d-inline-block" value="前画面に戻る" onClick="history.back()"></p>
			</form>
	<?php
    } ?>
</div>

</div>
</body>
</html>
<?php
}

if (($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) {
    ?>


<!DOCTYPE html>
<html lang=ja>

<head>
  <!-- IE -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <!-- SEO -->
  <title>社会福祉法人ほほえみ-苦楽を共にして生きていく- | 青森県平川市</title>
  <meta name="keywords" content="社会福祉法人,ほほえみ,青森県,平川市,カリフラワー,おらんど,uniメゾン,アピール">
  <meta name="description" content="【社会福祉法人ほほえみ】思いをうまく伝えられなかったり 体が思うように動かなかったり 障がいが有るとか無いとか、そんなことよりも あなたが抱える、生活の中の 「不便さ」や「もどかしさ」を 解消していく それが私たちほほえみの仕事です。">
  <meta name="author" content="株式会社プラス">
  <link rel="canonical" href="http://hohoemi-aomori.com">
  <!-- OGP -->
  <meta property="og:site_name" content="-">
  <meta property="og:title" content="社会福祉法人ほほえみ-苦楽を共にして生きていく- | 青森県平川市">
  <meta property="og:description" content="【社会福祉法人ほほえみ】思いをうまく伝えられなかったり 体が思うように動かなかったり 障がいが有るとか無いとか、そんなことよりも あなたが抱える、生活の中の 「不便さ」や「もどかしさ」を 解消していく それが私たちほほえみの仕事です。">
  <meta property="og:type" content="website">
  <meta property="og:url" content="http://hohoemi-aomori.com">
  <meta property="og:image" content="http://hohoemi-aomori.com/images/logo.png">
  <meta property="fb:app_id" content="192837465091827" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="http://hohoemi-aomori.com">
  <meta name="twitter:image" content="http://hohoemi-aomori.com/images/logo.png">
  <!-- favicon -->
  <link rel="icon" href="favicon.ico">
  <!-- web clip -->
  <link rel="apple-touch-icon" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="57x57" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="72x72" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="76x76" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="114x114" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="120x120" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="144x144" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="152x152" href="http://hohoemi-aomori.com/images/logo.png">
  <link rel="apple-touch-icon" sizes="180x180" href="http://hohoemi-aomori.com/images/logo.png">
  <!-- CSS dependencies -->
  <link rel="stylesheet" type="text/css" href="css/import.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
</head>
<body>
<div class="parent" style="height:100vh;background:url('images/1-2.jpg') no-repeat; background-size:cover;">
<div class="bg-mask-2 parent text-white">
<?php if ($empty_flag == 1) {
        ?>
<h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
<div style="color:red"><?php echo $errm; ?></div>
<br /><br /><input type="button" class="btn page-link text-dark d-inline-block" value=" 前画面に戻る " onClick="history.back()">
</div>
</body>
</html>
<?php
    } else {
        ?>
<p>送信ありがとうございました。<br />
送信は正常に完了しました。</p>
<a href="<?php echo $site_top; ?>" class="btn btn-default">トップページへ戻る</a>
</div>

</body>
</html>
<?php
    }
} elseif (($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) {
    if ($empty_flag == 1) {
        ?>
<div align="center"><h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4><div style="color:red"><?php echo $errm; ?></div><br /><br /><input type="button" class="btn page-link text-dark d-inline-block" value=" 前画面に戻る " onClick="history.back()"></div>
<?php
    } else {
        header("Location: " . $thanksPage);
    }
}

function checkMail($str)
{
    $mailaddress_array = explode('@', $str);
    if (preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) == 2) {
        return true;
    } else {
        return false;
    }
}
function h($string)
{
    global $encode;
    return htmlspecialchars($string, ENT_QUOTES, $encode);
}
function sanitize($arr)
{
    if (is_array($arr)) {
        return array_map('sanitize', $arr);
    }
    return str_replace("\0", "", $arr);
}

function sjisReplace($arr, $encode)
{
    foreach ($arr as $key => $val) {
        $key = str_replace('＼', 'ー', $key);
        $resArray[$key] = $val;
    }
    return $resArray;
}

function postToMail($arr)
{
    global $hankaku, $hankaku_array;
    $resArray = '';
    foreach ($arr as $key => $val) {
        $out = '';
        if (is_array($val)) {
            foreach ($val as $key02 => $item) {
                if (is_array($item)) {
                    $out .= connect2val($item);
                } else {
                    $out .= $item . ', ';
                }
            }
            $out = rtrim($out, ', ');
        } else {
            $out = $val;
        }
        if (get_magic_quotes_gpc()) {
            $out = stripslashes($out);
        }

        if ($hankaku == 1) {
            $out = zenkaku2hankaku($key, $out, $hankaku_array);
        }
        if ($out != "confirm_submit" && $key != "httpReferer") {
            $resArray .= "【 " . h($key) . " 】 " . h($out) . "\n";
        }
    }
    return $resArray;
}

function confirmOutput($arr)
{
    global $hankaku, $hankaku_array;
    $html = '';
    foreach ($arr as $key => $val) {
        $out = '';
        if (is_array($val)) {
            foreach ($val as $key02 => $item) {
                if (is_array($item)) {
                    $out .= connect2val($item);
                } else {
                    $out .= $item . ', ';
                }
            }
            $out = rtrim($out, ', ');
        } else {
            $out = $val;
        }
        if (get_magic_quotes_gpc()) {
            $out = stripslashes($out);
        }
        $out = nl2br(h($out));
        $key = h($key);

        if ($hankaku == 1) {
            $out = zenkaku2hankaku($key, $out, $hankaku_array);
        }

        $html .= "<tr><th>" . $key . "</th><td>" . $out;
        $html .= '<input type="hidden" name="' . $key . '" value="' . str_replace(array("<br />", "<br>"), "", $out) . '" />';
        $html .= "</td></tr>\n";
    }
    return $html;
}

function zenkaku2hankaku($key, $out, $hankaku_array)
{
    global $encode;
    if (is_array($hankaku_array) && function_exists('mb_convert_kana')) {
        foreach ($hankaku_array as $hankaku_array_val) {
            if ($key == $hankaku_array_val) {
                $out = mb_convert_kana($out, 'a', $encode);
            }
        }
    }
    return $out;
}

function connect2val($arr)
{
    $out = '';
    foreach ($arr as $key => $val) {
        if ($key === 0 || $val == '') {
            $key = '';
        } elseif (strpos($key, "円") !== false && $val != '' && preg_match("/^[0-9]+$/", $val)) {
            $val = number_format($val);
        }
        $out .= $val . $key;
    }
    return $out;
}

function adminHeader($userMail, $post_mail, $BccMail, $to)
{
    $header = '';
    if ($userMail == 1 && !empty($post_mail)) {
        $header = "From: $post_mail\n";
        if ($BccMail != '') {
            $header .= "Bcc: $BccMail\n";
        }
        $header .= "Reply-To: " . $post_mail . "\n";
    } else {
        if ($BccMail != '') {
            $header = "Bcc: $BccMail\n";
        }
        $header .= "Reply-To: " . $to . "\n";
    }
    $header .= "Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/" . phpversion();
    return $header;
}

function mailToAdmin($arr, $subject, $mailFooterDsp, $mailSignature, $encode, $confirmDsp)
{
    $adminBody = "「" . $subject . "」からメールが届きました\n\n";
    $adminBody .= "＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
    $adminBody .= postToMail($arr);
    $adminBody .= "\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
    $adminBody .= "送信された日時：" . date("Y/m/d (D) H:i:s", time()) . "\n";
    $adminBody .= "送信者のIPアドレス：" . @$_SERVER["REMOTE_ADDR"] . "\n";
    $adminBody .= "送信者のホスト名：" . getHostByAddr(getenv('REMOTE_ADDR')) . "\n";
    if ($confirmDsp != 1) {
        $adminBody .= "問い合わせのページURL：" . @$_SERVER['HTTP_REFERER'] . "\n";
    } else {
        $adminBody .= "問い合わせのページURL：" . @$arr['httpReferer'] . "\n";
    }
    if ($mailFooterDsp == 1) {
        $adminBody .= $mailSignature;
    }
    return mb_convert_encoding($adminBody, "JIS", $encode);
}

function userHeader($refrom_name, $to, $encode)
{
    $reheader = "From: ";
    if (!empty($refrom_name)) {
        $default_internal_encode = mb_internal_encoding();
        if ($default_internal_encode != $encode) {
            mb_internal_encoding($encode);
        }
        $reheader .= mb_encode_mimeheader($refrom_name) . " <" . $to . ">\nReply-To: " . $to;
    } else {
        $reheader .= "$to\nReply-To: " . $to;
    }
    $reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/" . phpversion();
    return $reheader;
}

function mailToUser($arr, $dsp_name, $remail_text, $mailFooterDsp, $mailSignature, $encode)
{
    $userBody = '';
    if (isset($arr[$dsp_name])) {
        $userBody = h($arr[$dsp_name]) . " 様\n";
    }
    $userBody .= $remail_text;
    $userBody .= "\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
    $userBody .= postToMail($arr);
    $userBody .= "\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
    $userBody .= "送信日時：" . date("Y/m/d (D) H:i:s", time()) . "\n";
    if ($mailFooterDsp == 1) {
        $userBody .= $mailSignature;
    }
    return mb_convert_encoding($userBody, "JIS", $encode);
}

function requireCheck($require)
{
    $res['errm'] = '';
    $res['empty_flag'] = 0;
    foreach ($require as $requireVal) {
        $existsFalg = '';
        foreach ($_POST as $key => $val) {
            if ($key == $requireVal) {
                if (is_array($val)) {
                    $connectEmpty = 0;
                    foreach ($val as $kk => $vv) {
                        if (is_array($vv)) {
                            foreach ($vv as $kk02 => $vv02) {
                                if ($vv02 == '') {
                                    $connectEmpty++;
                                }
                            }
                        }
                    }
                    if ($connectEmpty > 0) {
                        $res['errm'] .= "<p class=\"error_messe\">【" . h($key) . "】は必須項目です。</p>\n";
                        $res['empty_flag'] = 1;
                    }
                } elseif ($val == '') {
                    $res['errm'] .= "<p class=\"error_messe\">【" . h($key) . "】は必須項目です。</p>\n";
                    $res['empty_flag'] = 1;
                }

                $existsFalg = 1;
                break;
            }
        }
        if ($existsFalg != 1) {
            $res['errm'] .= "<p class=\"error_messe\">【" . $requireVal . "】が未選択です。</p>\n";
            $res['empty_flag'] = 1;
        }
    }

    return $res;
}

function refererCheck($Referer_check, $Referer_check_domain)
{
    if ($Referer_check == 1 && !empty($Referer_check_domain)) {
        if (strpos($_SERVER['HTTP_REFERER'], $Referer_check_domain) === false) {
            return exit('<p align="center">リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません</p>');
        }
    }
}

?>
