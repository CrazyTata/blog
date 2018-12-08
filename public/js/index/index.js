(function(){
	var model = {
		initial:function(){
			model.global();
            model.bind();
		},
		global:function(){
			model.data = new Vue({
				el:'#index',
				data:{

				},
				watch:{

				},
				methods:{

				},
			})
		}
	}
})();