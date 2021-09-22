<style>
html, body {
height: 100%;
}

.bb {
height: 100%;
display: flex;
align-items: center;
justify-content: center;
}






.bb::after {
content: '';
width: 30px; height: 30px;
border-radius: 100%;
border: 6px solid #00FFCB;
position: absolute;
z-index: -1;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
animation: ring 1.5s infinite;
}

@keyframes ring {
0% {
	width: 30px;
	height: 30px;
	opacity: 1;
}
100% {
	width: 300px;
	height: 300px;
	opacity: 0;
}
}
</style>


<div class="bb">
<input type="submit" name="" value="fff">
</div>
