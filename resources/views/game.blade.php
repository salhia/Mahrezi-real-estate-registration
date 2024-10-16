
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="#000" background="http://crescer-galaxy.surge.sh/img/sky.gif">
  <center>
    <h1>
    <font face="Impact" color="white" size="8">
    welcome
    @if(auth()->check())
        {{auth()->user()->name}}
    @endif
</font>
    
    </h1>
    
    <h2>
      <font face="Impact" color="orange" size="5">
      <a class="nav-link" href="{{ route('home') }}">Go Back</a>     
     </font>
    </h2>
  </center>
  <marquee direction="right" scrolldelay="0">
      <img src="http://crescer-galaxy.surge.sh/img/plan.png" alt="Nave" width="120">
   
  </marquee>
  <marquee direction="right" scrolldelay="200">
      <img src="http://crescer-galaxy.surge.sh/img/plan.png" alt="Nave" width="120">
    
  </marquee>
  <marquee direction="right" scrolldelay="130">
      <img src="http://crescer-galaxy.surge.sh/img/plan.png" alt="Nave" width="120">
  </marquee>
  <marquee direction="right" scrolldelay="100">
      <img src="http://crescer-galaxy.surge.sh/img/plan.png" alt="Nave" width="120">
  </marquee>
  <marquee direction="right" scrolldelay="150">
      <img src="http://crescer-galaxy.surge.sh/img/plan.png" alt="Nave" width="120">
  </marquee>
  <marquee direction="right" scrolldelay="50">
      <img src="http://crescer-galaxy.surge.sh/img/plan.png" alt="Nave" width="120">
  </marquee>
</body>
</html>

