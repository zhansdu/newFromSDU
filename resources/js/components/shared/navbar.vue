<template>
	<div id="navbar">
		<div class="logo">SDU<span class="subLogo"> library</span></div>
		<div><button class="button middle-round middle-shadowed">login</button></div>
	</div>
</template>
<script></script>
<style scoped>
#navbar{
	height:65px;
	background: #2E516C;
	width: 100%;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 0 10px;
}
.logo{
	font-size: 64px;
	font-weight: 900;
	color:white;
	letter-spacing: -8px;
}
.subLogo{
	font-size: 44.44%;
	letter-spacing: 0px;
}
.button{
	background: white;
	color:#2E516C;
	letter-spacing: -1px;
}
</style>