<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Job Placement Center - Poliwangi</title>
   <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0; box-sizing: border-box;">
   <table align="center" cellpadding="0" cellspacing="0" width="95%">
      <tr>
      <td align="center">
         <table align="center" cellpadding="0" cellspacing="0" width="600" style="border-spacing: 2px 5px;" bgcolor="#fff">
            <tr>
            <td align="center" style="padding: 5px 5px 5px 5px;">
               <a href="https://jpc.poliwangi.ac.id/" target="_blank">
                  <img src="https://jpc.poliwangi.ac.id/template/assets/img/logo4.png" alt="Logo" style="width:420px; margin: -100px -100px; border:0;"/>
               </a>
            </td>
            </tr>
            <tr>
            <td bgcolor="#fff">
               <table cellpadding="0" cellspacing="0" width="100%%">
                  <tr>
                  <td style="padding: 10px 0 10px 0; font-family: Nunito, sans-serif; font-size: 20px; font-weight: 900">
                     Lupa Kata Sandi Email
                  </td>
                  </tr>
               </table>
            </td>
            </tr>
            <tr>
            <td bgcolor="#fff">
               <table cellpadding="0" cellspacing="0" width="100%%">
                  <tr>
                  <td style="padding: 20px 0 20px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                     Hello, <span id="name"></span>
                  </td>
                  </tr>
                  <tr>
                  <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                     Mohon konfirmasi email ini untuk memulihkan kata sandi Anda.
                  </td>
                  </tr>
                  <tr>
                  <td style="padding: 20px 0 20px 0; font-family: Nunito, sans-serif; font-size: 16px; text-align: center;">
                     <a href="{{ route('reset.password.get', $token) }}" class="btn" style="background-color: rgba(255, 171, 0, 1); border: 1px solid rgba(255, 255, 255, 0.18); border-radius: 10px; color: white; padding: 15px 40px; text-align: center; display: inline-block; font-family: Nunito, sans-serif; font-size: 18px; font-weight: bold; cursor: pointer;">
                        Reset Password
                     </a>
                  </td>
                  </tr>
                  {{-- <tr>
                  <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                     <b>TETAPI</b> Jika anda tidak melakukan pendaftarkan anggota maka seseorang telah menggunakan email anda untuk mendaftarkan anggota, Maka abaikan email ini.
                  </td>
                  </tr> --}}
                  <tr>
                  <td style="padding: 50px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                     Regards,
                     <p>Job Placement Center Politeknik Negeri Banyuwangi Team</p>
                  </td>
                  </tr>
               </table>
            </td>
            </tr>
         </table>
      </td>
      </tr>
   </table>
</body>
</html>