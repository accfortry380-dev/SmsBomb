<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Matrix UI — Safe Version</title>

  <style>
    body{
      margin:0;
      background:#02070c;
      color:#00ffbf;
      font-family: "Courier New", monospace;
    }

    /* Matrix background */
    canvas#matrix{
      position:fixed;
      top:0;left:0;
      width:100%;height:100%;
      z-index:-1;
      background:black;
    }

    .card{
      width:100%;max-width:940px;margin:50px auto;padding:28px;
      background:rgba(0,0,0,0.45);
      border:1px solid rgba(0,255,180,0.2);
      border-radius:12px;
      backdrop-filter: blur(4px);
    }

    h3{
      font-size:34px;
      text-align:center;
      margin-top:0;
      margin-bottom:20px;
      color:#00ffbf;
      font-weight:700;
      text-shadow:0 0 12px #00ffbf;
    }

    label{color:#7fffe0;font-size:14px}
    input,button{
      width:100%;
      padding:12px;
      font-size:16px;
      color:#00ffbf;
      background:#031319;
      border:1px solid #00ffbf;
      border-radius:8px;
      margin-bottom:14px;
    }

    button{
      cursor:pointer;
      font-weight:700;
      background:#012e26;
      transition:0.2s;
    }

    button:hover{
      background:#005f52;
      box-shadow:0 0 12px #00ffbf;
    }

    .output{
      background:#000;
      border:1px solid #00ffbf33;
      padding:12px;
      height:220px;
      overflow:auto;
      border-radius:8px;
      color:#00ffbf;
      font-size:13px;
      margin-top:12px;
    }
  </style>
</head>
<body>

<canvas id="matrix"></canvas>

<div class="card">
  <h3>Matrix UI — Demo</h3>

  <label>Phone Number (Demo)</label>
  <input id="phone" placeholder="017xxxxxxxx" />

  <label>Amount (Demo)</label>
  <input id="amount" type="number" placeholder="1" />

  <button id="send">Submit</button>

  <div class="output" id="output">Output will appear here</div>
</div>

<script>
/* ---------------- MATRIX ANIMATION ---------------- */
const canvas = document.getElementById("matrix");
const ctx = canvas.getContext("2d");

function resizeCanvas(){
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}
resizeCanvas();
window.onresize = resizeCanvas;

const chars = "01".split("");
let drops = [];

function initDrops(){
  drops = Array(Math.floor(canvas.width / 10)).fill(1);
}
initDrops();

function draw(){
  ctx.fillStyle = "rgba(0,0,0,0.07)";
  ctx.fillRect(0,0,canvas.width,canvas.height);

  ctx.fillStyle = "#00ffbf";
  ctx.font = "14px monospace";

  drops.forEach((y,i)=>{
    const text = chars[Math.floor(Math.random()*chars.length)];
    ctx.fillText(text, i*10, y*10);

    if(y*10 > canvas.height && Math.random() > 0.975){
      drops[i] = 0;
    }

    drops[i]++;
  });
}
setInterval(draw, 33);

/* ---------------- SAFE OUTPUT DEMO ---------------- */
document.getElementById('send').onclick = ()=>{
  const phone = document.getElementById('phone').value.trim();
  const amt = document.getElementById('amount').value.trim();
  const out = document.getElementById('output');

  out.textContent = `Demo Only:
Phone: ${phone}
Amount: ${amt}
(No real requests sent — safe mode)`;
};
</script>

<!-- JOIN BOX -->
<div id="joinBox" style="
  display:none;
  position:fixed;
  top:0; left:0;
  width:100%; height:100%;
  background:rgba(0,0,0,0.75);
  backdrop-filter:blur(4px);
  z-index:999;
  display:flex;
  align-items:center;
  justify-content:center;
">
<div style="
  background:#031319; padding:25px; width:320px; text-align:center;
  border:1px solid #00ffbf; border-radius:10px; box-shadow:0 0 15px #00ffbf;
  color:#00ffbf; font-family:Courier New, monospace;
">
  <h2 style="margin-top:0; text-shadow:0 0 8px #00ffbf;">Join Our Channel</h2>
  <p style="font-size:15px; margin-bottom:18px;">
    This popup is now fixed and working properly.
  </p>

  <a href="https://t.me/+QLH5pM1tTs02YWI1" target="_blank"
     style="display:block; padding:10px 0; background:#005f52;
     border-radius:6px; color:#00ffbf; font-weight:bold; text-decoration:none;
     margin-bottom:10px;">
    Join Telegram Channel
  </a>

  <button onclick="document.getElementById('joinBox').style.display='none'"
    style="padding:10px; width:100%; background:#012e26;
    border:1px solid #00ffbf; color:#00ffbf; border-radius:6px;">
    Close
  </button>
</div>
</div>

</body>
</html>
