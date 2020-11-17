export default {
  data: function () {
    return {
      colorWheelIdx: 0,
      colorWheelColors: [
        'blue',
        'indigo',
        'purple',
        'pink',
        'red',
        'orange',
        'yellow',
        'green',
        'teal',
        'cyan',
      ],
    }
  },

  methods: {
    getRandomColor() {
      if (this.colorWheelIdx > this.colorWheelColors.length - 1) {
        this.colorWheelIdx = 0;
      } else {
        this.colorWheelIdx += 1;
      }

      return this.getColor(this.colorWheelColors[this.colorWheelIdx]);
    },

    getColor(color) {
      switch (color) {
        case 'blue':
          return '#006c80';
        case 'indigo':
          return '#6574cd';
        case 'purple':
          return '#9561e2';
        case 'pink':
          return '#f66d9b';
        case 'red':
          return '#f44034';
        case 'orange':
          return '#f6831e';
        case 'yellow':
          return '#ffed4a';
        case 'green':
          return '#8bb625';
        case 'teal':
          return '#4dc0b5';
        case 'cyan':
          return '#3ab0d4';
        default:
          return '#000';
      }
    },
  },
};
