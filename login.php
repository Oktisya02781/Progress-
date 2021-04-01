<!DOCTYPE html>
<html>
<head><title>Halaman Login</title>
<style>
.container {
height:100%;display:flex;justify-content:center;
}
.box{ width:350px;height:400px;background-color:DodgerBlue;
border-radius:10px;position:absolute;top:50%;
transform:translate(0,-50%);
}
</style>
</head>
<body>
<div class="container">
<div class="box">
<div style="font-size:32px;color:white;text-align:center;">Bekas Bagus</div>
<div>
<img src="assets/gambar/baju.jpg"
style="width:250px;height:250px;margin-left:auto;
margin-right:auto;display:block;align:center;
border-radius:10px;">

</div>
<br/>

<div style="text-align:center;">
<form method="POST" action="proses_login.php">
<fieldset>
<div><input type="text" name="tuser" placeholder="User"></div>
<br/>
<div><input type="password" name="tpass"
placeholder="Password"></div>

<br/>
</fieldset>
<button type="submit" style="background-color:green;color:
white;padding:10px;border-radius:8px;"> Login</button>
</form>
</div>
</div>
</div>
</body>
</html>