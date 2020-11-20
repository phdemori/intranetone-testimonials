'use strict';
let mix = require('laravel-mix');

function IOTestimonials(params={}){
  let $ = this;
  let dep = {
    testimonials: 'vendor/agileti/iotestimonials/src/assets/src/',
    moment: 'node_modules/moment/'
  }

  let config = {
    optimize:false,
    sass:false,
    cb:()=>{},
  }
  
  this.compile = (IO,callback = ()=>{})=>{

    mix.styles([
      IO.src.css + 'helpers/dv-buttons.css',
      IO.dep.io.toastr + 'toastr.min.css',
      IO.src.io.css + 'toastr.css',
      dep.testimonials + 'testimonials.css',
    ], IO.dest.io.root + 'services/io-testimonials.min.css');

    mix.babel([
      IO.dep.io.toastr + 'toastr.min.js',
      IO.src.io.js + 'defaults/def-toastr.js',
    ], IO.dest.io.root + 'services/io-testimonials-babel.min.js');
    
    mix.scripts([
      dep.moment + 'min/moment.min.js',
      IO.src.io.vendors + 'moment/moment-pt-br.js'
    ], IO.dest.io.root + 'services/io-testimonials-mix.min.js');

    //copy separated for compatibility
    mix.babel(dep.testimonials + 'testimonials.js', IO.dest.io.root + 'services/io-testimonials.min.js');
    mix.babel(dep.testimonials + 'jquery.autocomplete.min.js', IO.dest.io.root + 'vendors/jquery.autocomplete.min.js');
    mix.babel(dep.testimonials + 'jquery.mask.min.js', IO.dest.io.root + 'vendors/jquery.mask.min.js');
    
    callback(IO);
  }
}


module.exports = IOTestimonials;
