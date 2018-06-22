<?php
if ($_SERVER['HTTP_HOST'] == "cupcherry.com") {
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T37L75D');</script>
    <!-- End Google Tag Manager -->

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2857887040594289",
    enable_page_level_ads: true
    });
    </script>
    <?php
}

/* For SEO Exam Notifications */
if (!empty($notification)) {
    ?>
    <title>
        CupCherry Education : <?php echo $notification['ExamNotification']['title']; ?>
    </title>

    <meta name="description" content="<?php echo strip_tags($notification['ExamNotification']['notification_text']); ?>">
    <meta name="keywords" content="Online study, government exam practice, win exam like pro, ssc, ibps, ldc, exam tips, old papers">
    <meta name="robots" content="index, nofollow">
    <meta name="web_author" content="Dharmendra, Jay, Narveer, Shashank and Cupcherry Team">
    <meta name="language" content="English, Hindi">

    <!--<meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />-->
    <meta property="og:title" content="CUPCHERRY : <?php echo $notification['ExamNotification']['title']; ?>" />
    <meta property="og:description" content="<?php echo strip_tags($notification['ExamNotification']['notification_text']); ?>" />
    <!--<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />-->
    <?php
} elseif (!empty($noteData)) {
    ?>
    <title>
        <?php echo $noteData['Note']['title']; ?> | CupCherry Education
    </title>

    <meta name="description" content="<?php echo strip_tags($noteData['Note']['description']); ?>">
    <meta name="keywords" content="Online study, government exam practice, win exam like pro, ssc, ibps, ldc, exam tips, old papers">
    <meta name="robots" content="index, nofollow">
    <meta name="web_author" content="Dharmendra, Jay, Narveer, Shashank and Cupcherry Team">
    <meta name="language" content="English, Hindi">

    <!--<meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />-->
    <meta property="og:title" content="<?php echo $noteData['Note']['title']; ?>" />
    <meta property="og:description" content="<?php echo strip_tags($noteData['Note']['description']); ?>" />
    <!--<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />-->
    <?php
} else {
    ?>
    <title>
        <?php echo $this->fetch('title'); ?> - Cupcherry
    </title>

    <meta name="description" content="Cupcherry.com is an online education portal that provides interactive study material for students and learners. Complete with elaborate interactive exercises, practice tests and expert help, we endeavour to make study easy for students and help them score more.">
    <meta name="keywords" content="Online study, government exam practice, win exam like pro, ssc, ibps, ldc, exam tips, old papers">
    <meta name="robots" content="index, nofollow">
    <meta name="web_author" content="Dharmendra, Jay, Narveer, Shashank and Cupcherry Team">
    <meta name="language" content="English, Hindi">
    <?php
}
?>

