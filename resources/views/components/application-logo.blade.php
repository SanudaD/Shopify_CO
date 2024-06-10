<style>
    @keyframes revealLetters {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    h1 {
      font-size: 36px;
      font-weight: bold;
      color: #b0811a;
      text-transform: uppercase;
      letter-spacing: 10px;
      margin: 0;
    }

    h1 span {
      display: inline-block;
      opacity: 0;
      animation: revealLetters 4s ease forwards infinite;
      animation-delay: calc(0.2s * var(--index));
    }
  </style>
<h1>
    <span style="--index: 1;">S</span>
    <span style="--index: 2;">h</span>
    <span style="--index: 3;">o</span>
    <span style="--index: 4;">p</span>
    <span style="--index: 5;">i</span>
    <span style="--index: 6;">f</span>
    <span style="--index: 7;">y</span>
    <span>&nbsp;</span> 
    <span style="--index: 8;">C</span>
    <span style="--index: 9;">o</span>
    <span style="--index: 10;">.</span>
  </h1>

