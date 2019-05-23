<?php
use PFBC\Form;

session_start();

// Set default bootstrap version here that can be overrriden by request
$version = '4';
if (isset ($_GET['v']) && ($_GET['v'] !== $version))
    $version = intval($_GET['v']);
$options = Array ('1' => 'option #1', '2' => 'option #2');

// default values
$values['email'] = 'testemail@test.com';
$values['password'] = 'testpass';
$values['select'] = 2;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP-Bootstrap-Form Example</title>
<?php if ($version == 4) { ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <!-- bootstrap.bundle.min.js includes Popper but not jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<?php } else {?>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php } ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class='container'>
        <br>
        <a href='api/'>BACK TO DOCS</a> :: <a href='example.php?v=4'>SAME FORM (BOOSTRAP 4)</a> :: <a href='example_ccform.php'>AJAX DEMO CREDIT CARD</a> :: <a href='example_ccform.php?v=4'>AJAX DEMO CREDIT CARD (BOOSTRAP 4)</a>
        <hr>
        <div class='row'>
            <div class='col-md-6'>
                <?php
                $objFm = new Form();
                $objFm->open ("login", $values, array ('view' => "SideBySide$version"));
                echo '<legend>Base</legend>';
                $objFm->Hidden("id");
                $objFm->Email("Email Address", "email", array("required" => 1, "prepend" => '@'));
                $objFm->Password ("Password", "password", array("required" => 1));

                $objFm->File("File", "file");
                $objFm->Textarea("Textarea", "textarea");
                $objFm->Textbox ("Text", "text", ['class' => 'form-control-lg', 'placeholder' => 'bootstrap4 .form-control-lg']);
                $objFm->Textbox ("Text", "text", ['class' => 'form-control-sm', 'placeholder' => 'boostrap4 .form-control-sm']);
                $objFm->Textbox ("Text", "text");
                $objFm->Select("Select", "select", $options);
                $objFm->HTML('<legend>HTML5</legend>');
                $objFm->Phone("Phone", "phone", array ("append" => '<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>',
                                                     "placeholder" => '(212) 3455-333'));
                $objFm->Search("Search", "search");
                $objFm->Url("Url", "url");
                $objFm->Date("Date", "date");
                $objFm->DateTime("DateTime", "datetime", array ('shared' => 'col-xs-12 col-md-4'));
                $objFm->DateTimeLocal("", "DateTimeLocal", array ('shared' => 'col-xs-12 col-md-4', 'placeholder' => 'DateTime-Local'));
                $objFm->Month("Month", "month");
                $objFm->Week("Week", "week");
                $objFm->Time("Time", "time");
                $objFm->Number("Number", "Number");
                $objFm->Range("Range", "Range");
                $objFm->Color("Color", "Color");

                echo '<legend>Custom/Other</legend>';
                $objFm->State("State", "State");
                $objFm->Country("Country", "Country");
                $objFm->YesNo("Yes/No", "YesNo");
                $objFm->Captcha("Captcha");
                ?>
            </div>
            <div class='col-md-6'>
                <?php
                echo '<legend>Checkboxes</legend>';
                $objFm->Checkbox ("CheckInline", "Remember", $options, array('inline' => 1));
                $objFm->Checkbox ("Regular", "something else", $options);

                echo '<legend>Radios</legend>';
                $objFm->Radio("Inline", "Remember", $options, array('inline' => 1));
                $objFm->Radio("", "something else", $options);

                $objFm->HTML('<legend>jQuery UI</legend>');
                $objFm->jQueryUIDate("Date", "jQueryUIDate");
                $objFm->Sort("Sort", "Sort", $options);
                $objFm->Checksort("Checksort", "Checksort", $options);
                $objFm->Checksort("Checksort inline ", "Checksort", $options, array('inline' => 1));

                echo '<legend>WYSIWYG Editor</legend>';
                $objFm->TinyMCE("TinyMCE", "TinyMCE");
                $objFm->CKEditor("CKEditor", "CKEditor");

                $objFm->Button('GOGOGO', '');
                $objFm->Button('GOGOGO', 'button');
                $objFm->Button('GOGOGO', 'button', ['icon' => 'glyphicon glyphicon-earphone']);
                ?>
            </div>
        </div>
    <?php
    $objFm->close();
    ?>
    </div>
</body>
