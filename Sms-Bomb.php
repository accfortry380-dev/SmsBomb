<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>SMS API Sender тАФ Hacker Theme</title>

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

  <h3>тШая╕П SMS Bomber counter тШая╕П</h3>

  <label>Phone Number</label>
  <input id="phone" placeholder="017xxxxxxxx" />

  <label>Amount</label>
  <input id="amount" type="number" placeholder="1" />

  <button id="send">Start Bombing</button>

  <div class="output" id="output">Output will appear here</div>
</div>

<script>
// Matrix animation
const c = document.getElementById("matrix");
const ctx = c.getContext("2d");
c.height = window.innerHeight;
c.width = window.innerWidth;
const chars = "01".split("");
const drops = Array(Math.floor(c.width / 10)).fill(1);

function draw(){
  ctx.fillStyle = "rgba(0,0,0,0.07)";
  ctx.fillRect(0,0,c.width,c.height);
  ctx.fillStyle = "#00ffbf";
  ctx.font = "14px monospace";

  drops.forEach((y,i)=>{
    const text = chars[Math.floor(Math.random()*chars.length)];
    ctx.fillText(text, i*10, y*10);
    if(y*10 > c.height && Math.random() > 0.975) drops[i] = 0;
    drops[i]++;
  });
}
setInterval(draw, 33);

// Output logic only (same as original)
const phoneEl = document.getElementById('phone');
const amountEl = document.getElementById('amount');
const output = document.getElementById('output');
const send = document.getElementById('send');

function normalizePhone(raw){return raw.replace(/[^0-9]/g,'');}
function buildUrl(p,a){return `https://bj-x-coder.top/bo_m_ber.php?phone=${p}&amount=${a}`;}

send.onclick = async()=>{
  const phone = normalizePhone(phoneEl.value.trim());
  const amount = amountEl.value.trim() || '1';
  if(!phone){output.textContent='ржлрзЛржи ржжрж┐ржиред';return;}
  const url = buildUrl(phone,amount);
  output.textContent = 'Requesting... ';
  try{
    const res = await fetch(url);
    const txt = await res.text();
    output.textContent = `Response (${res.status}):\n\n${txt}`;
  }catch(e){output.textContent = 'Error: '+e.message;}
};
</script>

<!-- Join Channel Notification -->
<div id="joinBox" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.75); backdrop-filter:blur(4px); z-index:999; display:flex; align-items:center; justify-content:center;">
<div style="background:#031319; padding:25px; width:320px; text-align:center; border:1px solid #00ffbf; border-radius:10px; box-shadow:0 0 15px #00ffbf; color:#00ffbf; font-family:Courier New, monospace;">
<h2 style="margin-top:0; text-shadow:0 0 8px #00ffbf;">ЁЯУв Join Our Channel</h2>
<p style="font-size:15px; margin-bottom:18px;">ЁЯФе ржЖржкржбрзЗржЯ ржкрзЗрждрзЗ ржПржмржВ ржирждрзБржи ржЯрзБрж▓рж╕ ржкрзЗрждрзЗ ржПржЦржиржЗ ржЖржорж╛ржжрзЗрж░ ржЪрзНржпрж╛ржирзЗрж▓рзЗ ржпрзБржХрзНржд рж╣ржи!</p>
<a href="https://t.me/+QLH5pM1tTs02YWI1" target="_blank" style="display:block; padding:10px 0; background:#005f52; border-radius:6px; color:#00ffbf; font-weight:bold; text-decoration:none; margin-bottom:10px;">ЁЯСЙ Join Telegram Channel</a>
<button onclick="document.getElementById('joinBox').style.display='none'" style="padding:10px; width:100%; background:#012e26; border:1px solid #00ffbf; color:#00ffbf; border-radius:6px;">Close</button>
</div>
</div>

</body>
</html>
