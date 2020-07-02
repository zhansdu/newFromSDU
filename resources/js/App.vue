<template>
	<v-app>
		<navbar/>
		<div id="main">
			<router-view></router-view>
		</div>
		<foot />
	</v-app>
</template>
<script>
	import navbar from './components/shared/Navbar'
	import foot from './components/shared/Footer'
	export default{
		components:{navbar,foot}
	}
</script>
<style>
@import './assets/styles/style.css'
</style>
