<?php
error_reporting(E_ALL & ~E_NOTICE);

// htmlspecialcharsを簡略化する
function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

// 配列系用のvar_dumpを改行させる
function v($y)
{
    echo "<pre class ='var_dump'>";
    var_dump($y);
    echo "</pre>";
}


// PDO接続先の設定
define("HOST", "localhost");
define("DB_NAME", "dawnsns");
define("USER", "root");
define("PASS", "");

// 文字化け対策
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'");
// DBとの接続を開始！！
$pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS, $options);

// 接続エラーが起こった際、例外処理にexception指定のエラー表示を使えるようにする
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// スクリプト処理後もデータベース接続を維持しないようにする
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="images/main_logo.png"></a></h1>
            <div id="">
                <div id="">
                    <p>{{ Auth::user()->username }}さん<img src="images/dawn.png"></p>
                <div>
                <ul>
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
