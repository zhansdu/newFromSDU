<template>
	<div id="app">
		<navbar/>
		<div id="main">
			<router-view></router-view>
		</div>
		<foot />
	</div>
</template>
<script>
	import navbar from './components/shared/navbar'
	import foot from './components/shared/footer'
	export default{
		components:{navbar,foot}
	}
</script>
<style>
@import './assets/styles/style.css'
</style>