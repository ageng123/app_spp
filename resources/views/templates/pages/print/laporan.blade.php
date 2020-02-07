<html>
  <head>
    <meta>
    <title>Laporan SPP</title>
    <style type="text/css" media="screen"></style>

<style type="text/css" media="print">


/* @page {size:landscape}  */
@media print {

    @page {size: A4 landscape;max-height:100%; max-width:100%}

    /* use width if in portrait (use the smaller size to try
       and prevent image from overflowing page... */
    img { height: 90%; margin: 0; padding: 0; }

body{width:94%;
    height:94%;
  }
}
</style>

  </head>
  <body on="window.print;" style="text-align: center" >
    <div class="" style="max-width: 100%; min-weight: 90%">
      <h2>
        Laporan Pembayaran SPP Siswa
      </h2>
      <table>
        <tr>
          <td><h3>Periode</h3></td>
          <td><h3>:</h3></td>
          <td><h3>{{$periode}}</h3></td>
        </tr>
      </table>
      <table border="1"  cellspacing="0" cellpadding="10">
          <thead>
            <tr>
              <td>no</td>
               <td>NISN</td>
               <td>Nama Siswa</td>
               <td>L/P</td>
               <td>Januari</td>
               <td>Februari</td>
               <td>Maret</td>
               <td>April</td>
               <td>Mei</td>
               <td>Juni</td>
               <td>Juli</td>
               <td>Agustus</td>
               <td>September</td>
               <td>Oktober</td>
               <td>November</td>
               <td>Desember</td>
            </tr>
          </thead>
          <tbody>
            <?php echo html_entity_decode($result) ?>
          </tbody>
      </table>
      <button type="button" onclick="print()" name="button">print</button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {   // Chrome Browser Detected?
                        window.PPClose = false;                                     // Clear Close Flag
                        // window.onbeforeunload = function () {                         // Before Window Close Event
                        //     if (window.PPClose === false) {                           // Close not OK?
                        //         return 'Leaving this page will block the parent window!\nPlease select "Stay on this Page option" and use the\nCancel button instead to close the Print Preview Window.\n';
                        //     }
                        // }
                        // window.document.close();
                       // newWin.resizeTo(0, 0);
                        //newWin.moveTo(0, window.screen.availHeight + 10);
                       // newWin.focus();
                        window.close();
                        window.PPClose = true;                                      // Set Close Flag to OK.
                    } else {
                      print();
                      window.close;
                    }
      })
    </script>
  </body>
</html>
