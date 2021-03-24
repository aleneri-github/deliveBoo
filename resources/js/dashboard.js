require('./bootstrap');
import Vue from 'vue';

var indexMenu = new Vue(
  {
    el: "#indexMenu",
    data: {
      show: false,
      indexOfList: -1,
      isActive: true,
      activeClass: 'dish-show'
    },

    methods: {
      prova() {
        this.renderComponent = false;

        this.$nextTick(() => {
          // Add the component back in
          this.renderComponent = true;
        });
      }
    },
    mounted() {
      $(document).on("click", ".row-food", () => {
        this.prova()
      });
    }

  }
);
