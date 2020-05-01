<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<base href="<?php echo base_url();?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatable Server Side</title>
    <link href="lib/global/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-12 col-xs-12">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr class="headings">
                        <th class="teks-kiri" width="10px">No. </th>
                        <th class="teks-kiri">Username </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                    <td width="10px"></td>
                    <td><input type="text" data-column="1" class="search-input-text form-control"></td>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>  
            </div>
        </div>
        <p class="footer" style="margin-left:10px;">Page rendered in <strong>{elapsed_time}</strong> seconds. </p>
      </div>

    <script src="lib/global/scripts/jquery.min.js" type="text/javascript"></script>
    <script src="lib/global/scripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="lib/global/scripts/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="lib/global/scripts/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="lib/controllers/user.js" type="text/javascript"></script>
</body>

</html>