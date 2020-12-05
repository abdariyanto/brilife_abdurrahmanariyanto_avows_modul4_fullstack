<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script type="text/javascript">
        $(function() {
            $('#berlaku_mulai').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    dateFormat:"dd-mm-yy",
                }),
                $('#berlaku_akhir').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    dateFormat:"dd-mm-yy",
                })
        });
    </script>
</head>

<body>

    <?= $isi; ?>
</body>

</html>