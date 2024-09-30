<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("inc/header.php");?>
</head>
<style>
    .pagination {
  position: absolute !important;
  width: 100%;
  text-align: center;
  right: 0;
  padding: 0 !important;
  bottom: 30px;
  z-index: 999;
  
  &__item {
    cursor: pointer;
    display: inline-block;
    white-space: nowrap;
    font-size: 0;
    width: 10px;
    height: 10px;
    border: 1px solid #fff;
    margin: 0 5px;
    transition: .2s ease-in-out;
    
    &.is-current,
    &:hover{
      background-color: #fff;
    }
  }
}

.container {
  position: relative;
  margin: 0 auto;
  
  @media (max-width: 699px) {
    padding-right: 40px;
    padding-left: 40px;
  }
  
  @media (min-width: 700px) and (max-width: 1599px) {
    padding-right: 7.5rem;
    padding-left: 7.5rem;
    max-width: 140rem;
  }
  
  @media (min-width: 1600px) {
    padding-right: 9.5625rem;
    padding-left: 9.5625rem;
    max-width: 144.125rem;
  }
}

.background-absolute {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-position: center;
  background-size: cover;  
}

.slideshow {
  position: relative;
  color: #ffffff;
  background-color: #1e1e22;
  overflow: hidden;
  height: 100vh;
  min-height: 400px;
  
  &__slide {
    visibility: hidden;
    transition: visibility 0s 1.7s;
    
    &.is-current {
      visibility: visible;
      transition-delay: 0s;
    }
  }
  
  @media (max-width: 699px) {
    .slideshow__slide {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }
  }
  
  @media (min-width: 700px) {
    .slideshow__slide {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }
  }
}

.slideshow__slide-background-load-wrap {
  transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
  transform: translate3d(0, 100%, 0);
  overflow: hidden;
}

.is-loaded .slideshow__slide-background-load-wrap {
  transform: translate3d(0, 0, 0);
  transition-delay: 0s;
}

.slideshow__slide.is-prev .slideshow__slide-background-parallax,
.slideshow__slide.is-next .slideshow__slide-background-parallax {
  transform: none !important;
}

.slideshow__slide.is-prev-section .slideshow__slide-background-parallax,
.slideshow__slide.is-next-section .slideshow__slide-background-parallax {
  transform: none !important;
}

.slideshow__slide-background-load {
  transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
  transform: translate3d(0, -50%, 0);
}

.is-loaded .slideshow__slide-background-load {
  transform: translate3d(0, 0, 0);
}

.slideshow__slide-background-wrap {
  transition: -webkit-transform 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.5s;
  transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.5s;
  transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.5s, -webkit-transform 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.5s;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.slideshow__slide.is-prev .slideshow__slide-background-wrap {
  -webkit-transform: translate3d(0, -100%, 0);
          transform: translate3d(0, -100%, 0);
}

.slideshow__slide.is-next .slideshow__slide-background-wrap {
  -webkit-transform: translate3d(0, 100%, 0);
          transform: translate3d(0, 100%, 0);
}

.slideshow__slide.is-prev-section .slideshow__slide-background-wrap {
  -webkit-transform: translate3d(0, -100%, 0);
          transform: translate3d(0, -100%, 0);
  transition: none;
}

.slideshow__slide.is-next-section .slideshow__slide-background-wrap {
  -webkit-transform: translate3d(0, 100%, 0);
          transform: translate3d(0, 100%, 0);
  transition: none;
}

.slideshow__slide-background {
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1) 1.5s;
  transform: scale(1);
  overflow: hidden;
}

.slideshow__slide.is-prev .slideshow__slide-background, .slideshow__slide.is-next .slideshow__slide-background {
  transform: scale(0.5);
  transition-delay: 0s;
}

.slideshow__slide.is-prev-section .slideshow__slide-background, .slideshow__slide.is-next-section .slideshow__slide-background {
  transform: scale(0.5);
  transition-delay: 0s;
  transition: none;
}

.slideshow__slide-image-wrap {
  transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.6s;
  transform: translate3d(0, 0, 0);
}

.slideshow__slide.is-prev .slideshow__slide-image-wrap {
  transform: translate3d(0, 50%, 0);
}

.slideshow__slide-image {
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1) 1.5s;
  transform: scale(1);
}

.slideshow__slide.is-prev .slideshow__slide-image, .slideshow__slide.is-next .slideshow__slide-image {
  transform: scale(1.25);
  transition-delay: 0s;
}

.slideshow__slide.is-prev-section .slideshow__slide-image, .slideshow__slide.is-next-section .slideshow__slide-image {
  transform: scale(1.25);
  transition-delay: 0s;
  transition: none;
}

.slideshow__slide-image::before, .slideshow__slide-image::after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  opacity: 0.35;
}

.slideshow__slide-image::before {
  background-color: #1e1e22;
}

.slideshow__slide-image::after {
  background: linear-gradient(to bottom, transparent 0%, #1e1e22 100%);
}

.slideshow__slide.is-prev .slideshow_container,
.slideshow__slide.is-next .slideshow_container {
          transform: none !important;
}

.slideshow__slide.is-prev-section .slideshow_container,
.slideshow__slide.is-next-section .slideshow_container {
          transform: none !important;
}

.slideshow__slide-caption-text {
  position: relative;
  height: 100%;
  padding-top: 33vh;
  transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.4s;
  transform: translate3d(0, 0, 0);
}

.slideshow__slide.is-prev .slideshow__slide-caption-text {
  transform: translate3d(0, -100%, 0);
}

.slideshow__slide.is-next .slideshow__slide-caption-text {
  transform: translate3d(0, 100%, 0);
}

.slideshow__slide.is-prev-section .slideshow__slide-caption-text {
  transform: translate3d(0, -100%, 0);
  transition: none;
}

.slideshow__slide.is-next-section .slideshow__slide-caption-text {
  transform: translate3d(0, 100%, 0);
  transition: none;
}

.slideshow__slide-caption {
  position: relative;
  height: 100%;
  transform: translate3d(0, 100%, 0);
  transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.1s;
}

.is-loaded .slideshow__slide-caption {
  transform: translate3d(0, 0, 0);
}

.slideshow__slide-caption-title {
  line-height: 1;
  
  @media (max-height: 500px) {
    margin-bottom: 0 !important;
  }
}



@media (max-width: 699px) {
  .slideshow__slide-caption-title {
    font-size: 40px;
    margin-bottom: 150px;
  }
  .slideshow.-full .slideshow__slide-caption-title {
    margin-bottom: 30px;
  }
}

@media (min-width: 700px) {
  .slideshow__slide-caption-title {
    font-size: 5.625rem;
    margin-bottom: 1.25rem;
  }
}

@media (min-width: 700px) and (max-width: 749px) {
  .slideshow__slide-caption-title {
    font-size: 4.375rem;
  }
}

@media (min-width: 1600px) {
  .slideshow__slide-caption-title {
    font-size: 6.25rem;
  }
}

.slideshow__slide-caption-title.-full {
  width: 100%;
}

.slideshow__slide-caption-subtitle {
  display: inline-block;
  padding: 1.875rem 0;
}

.slideshow__slide-caption-subtitle.-load {
  transition: -webkit-transform 0.9s cubic-bezier(0.4, 0, 0.2, 1) 0.4s;
  transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1) 0.4s;
  transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1) 0.4s, -webkit-transform 0.9s cubic-bezier(0.4, 0, 0.2, 1) 0.4s;
  -webkit-transform: translate3d(0, 3.75rem, 0);
          transform: translate3d(0, 3.75rem, 0);
}

.is-loaded .slideshow__slide-caption-subtitle.-load {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

body[data-route-option="prev-section"] .slideshow__slide-caption-subtitle.-load, body[data-route-option="next-section"] .slideshow__slide-caption-subtitle.-load {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.slideshow__slide-caption-subtitle-label {
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transform: translateZ(0);
  display: inline-block;
}

.o-hsub.-link:hover .slideshow__slide-caption-subtitle-label, .o-hsub-wrap:hover .slideshow__slide-caption-subtitle-label {
  transform: translateX(20px);
}



/* OLD */

.c-header-home_heading {
  line-height: 1;
}

@media (max-height: 500px) {
  .c-header-home_heading {
    margin-bottom: 0 !important;
  }
}

@media (max-width: 699px) {
  .c-header-home_heading {
    font-size: 40px;
    margin-bottom: 150px;
  }
  .c-header-home.-full .c-header-home_heading {
    margin-bottom: 30px;
  }
}

@media (min-width: 700px) {
  .c-header-home_heading {
    font-size: 5.625rem;
    margin-bottom: 1.25rem;
  }
}

@media (min-width: 700px) and (max-width: 749px) {
  .c-header-home_heading {
    font-size: 4.375rem;
  }
}

@media (min-width: 1600px) {
  .c-header-home_heading {
    font-size: 6.25rem;
  }
}

.c-header-home_heading.-full {
  width: 100%;
}

.c-header-home_subheading {
  display: inline-block;
  padding: 1.875rem 0;
}

.c-header-home_subheading.-load {
  transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1) 0.4s;
  transform: translate3d(0, 3.75rem, 0);
}

.is-loaded .c-header-home_subheading.-load {
          transform: translate3d(0, 0, 0);
}

body[data-route-option="prev-section"] .c-header-home_subheading.-load, body[data-route-option="next-section"] .c-header-home_subheading.-load {
  transform: translate3d(0, 0, 0);
}

.c-header-home_footer {
  z-index: 3;
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
}

.c-header-home_controls, .c-header-home_buttons {
  margin-left: 0;
  letter-spacing: normal;
  font-size: 0;
  transition: -webkit-transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  -webkit-transform: translate3d(0, 100%, 0);
          transform: translate3d(0, 100%, 0);
}

@media (max-width: 699px) {
  .c-header-home_controls, .c-header-home_buttons {
    padding-bottom: 40px;
  }
}

@media (min-width: 700px) {
  .c-header-home_controls, .c-header-home_buttons {
    padding-bottom: 5.625rem;
  }
}

@media (min-width: 700px) and (max-width: 749px) {
  .c-header-home_controls, .c-header-home_buttons {
    padding-bottom: 3.75rem;
  }
}

.is-loaded .c-header-home_controls, .is-loaded .c-header-home_buttons {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

body[data-route-option="prev-section"] .c-header-home_controls, body[data-route-option="prev-section"] .c-header-home_buttons, body[data-route-option="next-section"] .c-header-home_controls, body[data-route-option="next-section"] .c-header-home_buttons {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.c-header-home_controls {
  transition-delay: 0.65s;
}

@media (min-width: 700px) {
  .c-header-home_controls {
    float: left;
  }
}

@media (max-width: 999px) {
  .c-header-home_controls.-nomobile {
    //display: none;
  }
}

.c-header-home_buttons {
  transition-delay: 0.75s;
}

@media (max-width: 699px) {
  .c-header-home_buttons {
    margin-left: -20px;
    margin-right: -20px;
  }
}

@media (min-width: 1000px) {
  .c-header-home_buttons {
    float: right;
  }
}

@media (max-width: 699px) {
  .c-header-home_button {
    width: 50% !important;
  }
}

@media (min-width: 700px) {
  .c-header-home_button {
    width: 15.625rem;
  }
}





















button, .c-header-filters_button,
.o-button {
  display: inline-block;
  overflow: visible;
  margin: 0;
  padding: 0;
  outline: 0;
  border: 0;
  background: none;
  color: inherit;
  vertical-align: middle;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  font: inherit;
  line-height: normal;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

button:hover, .c-header-filters_button:hover,
.o-button:hover {
  text-decoration: none;
}

@media (min-width: 1200px) {
  body {
    overflow: hidden;
    height: 100%;
  }
}

@media (min-width: 1200px) {
  .o-scroll {
    height: 100%;
  }
}

::-moz-selection {
  background: #0084c0;
  color: #ffffff;
}

::selection {
  background: #0084c0;
  color: #ffffff;
}

img, svg {
  max-width: 100%;
}

a, .o-link {
  color: #1a0dab;
  transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

a:hover, .o-link:hover {
  color: #13097c;
}

a.-normal, .o-link.-normal {
  color: currentColor;
  text-decoration: none;
}

a.-normal:hover, .o-link.-normal:hover {
  text-decoration: underline;
}

a.-blue:hover, .o-link.-blue:hover {
  text-decoration: none;
  color: #0084c0;
}

a.-hover, .o-link.-hover {
  position: relative;
  text-decoration: none;
  color: #ffffff;
}

a.-hover::after, .o-link.-hover::after {
  content: "";
  position: absolute;
  bottom: -1px;
  right: 0;
  left: 0;
  border-bottom: 1px solid;
  transform: scaleX(0);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transform-origin: center left;
}

a.-hover:hover::after, .o-link.-hover:hover::after {
  transform: scaleX(1);
}

p {
  margin: 0;
}

.o-wrap {
  overflow: hidden;
}

.o-page.-anim {
          transform: translate3d(0, 9.375rem, 0);
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.is-loaded .o-page.-anim {
  transform: translate3d(0, 0, 0);
}

.o-barba, .o-barba_container {
  height: 100%;
}

strong {
  font-weight: 700;
}

.js-parallax {
  transform: translateZ(0);
  will-change: transform;
}

.scroll-content {
  overflow: hidden;
}

.o-blockquote.-nomargin {
  margin: 0;
}

.o-action-link {
  display: block;
  padding-top: 12.8125rem;
  padding-bottom: 7.5rem;
  text-align: center;
  text-decoration: none;
  font-weight: 700;
}

@media (max-width: 699px) {
  .o-action-link {
    font-size: 40px;
    padding-top: 120px;
  }
}

@media (max-width: 1199px) {
  .o-action-link {
    color: #1e1e22;
  }
}

@media (min-width: 700px) {
  .o-action-link {
    font-size: 5.625rem;
  }
}

@media (min-width: 1200px) {
  .o-action-link {
    color: #ffffff;
  }
}

.o-action-link:hover {
  color: #ffffff;
}

.o-action-link_label {
  display: inline-block;
  position: relative;
}

.o-action-link_label::after {
  content: "";
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  border-bottom: 0.1875rem solid;
          transform: scaleX(0);
          transform-origin: center left;
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.o-action-link:hover .o-action-link_label::after {
          transform: scaleX(1);
}

.o-h, h1, .o-h1, h2, .o-h2, h3, .o-h3, h4, .o-h4, h5, .o-h5, h6, .o-h6 {
  font-weight: 700;
  margin-top: 0;
  line-height: 1.1;
}

@media (max-width: 699px) {
  h1, .o-h1 {
    font-size: 26px;
  }
}

@media (min-width: 700px) {
  h1, .o-h1 {
    font-size: 60px;
  }
}

@media (min-width: 1600px) {
  h1, .o-h1 {
    font-size: 4.375rem;
  }
}

@media (max-width: 1599px) {
  h2, .o-h2 {
    font-size: 1.5625rem;
  }
}

@media (min-width: 1600px) {
  h2, .o-h2 {
    font-size: 2.25rem;
  }
}

h3, .o-h3 {
  font-size: 1.5625rem;
}

h4, .o-h4 {
  font-size: 1rem;
}

h5, .o-h5 {
  font-size: 0.8125rem;
}

h6, .o-h6 {
  font-size: 0.6875rem;
}

.o-hsub {
  font-size: 0.75rem;
  padding: 1.25rem 0;
  display: inline-block;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  font-weight: 500;
}

.o-hsub::before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  border-bottom: 1px solid;
  width: 1.5rem;
  background-color: #1e1e22;
  margin-right: 1.125rem;
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transform-origin: center left;
}

.o-hsub.-link {
  color: #ffffff;
  text-decoration: none;
}

.o-hsub.-link:hover::before, .o-hsub-wrap:hover .o-hsub.-link::before {
  transform: scaleX(1.5);
}

.o-hsub.-link.-dark {
  color: #1e1e22;
}

.o-hsub.-link.-dark:hover {
  color: #1e1e22;
}

.o-hsub.-h {
  vertical-align: middle;
}

@media (max-width: 699px) {
  .o-hsub.-h {
    display: block;
    margin-top: 20px;
  }
}

@media (min-width: 700px) {
  .o-hsub.-h {
    margin-left: 2.5rem;
  }
}

.o-hsub_label {
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transform: translateZ(0);
  display: inline-block;
}

.o-hsub.-link:hover .o-hsub_label, .o-hsub-wrap:hover .o-hsub_label {
  transform: translateX(20px);
}
.is-loaded .o-loader {
  visibility: hidden;
  transition-delay: 0.6s;
}

.o-container {
  position: relative;
  margin: 0 auto;
}

@media (max-width: 699px) {
  .o-container {
    padding-right: 40px;
    padding-left: 40px;
  }
  .o-container.-small {
    padding-right: 20px;
    padding-left: 20px;
  }
}

@media (min-width: 700px) and (max-width: 1599px) {
  .o-container {
    padding-right: 7.5rem;
    padding-left: 7.5rem;
    max-width: 140rem;
  }
}

@media (min-width: 1600px) {
  .o-container {
    padding-right: 9.5625rem;
    padding-left: 9.5625rem;
    max-width: 144.125rem;
  }
}

.o-section {
  position: relative;
}

.o-section.-offset {
  margin-top: -9.375rem;
  background-color: #f6f6f6;
}

.o-section.-padding {
  padding-top: 7.5rem;
  padding-bottom: 7.5rem;
}

.o-section.-padding-top {
  padding-top: 7.5rem;
}

@media (max-width: 699px) {
  .o-section.-bottom {
    padding-bottom: 60px;
  }
}

@media (min-width: 700px) {
  .o-section.-bottom {
    padding-bottom: 7.5rem;
  }
}

.o-section.-left {
  margin-right: 15rem;
}

.o-section.-right {
  margin-left: 15rem;
}

.o-section.-left-large {
  margin-right: 22.5rem;
}

.o-section.-right.-padding {
  padding-left: 9.5625rem;
}

.o-section_image {
  position: relative;
  overflow: hidden;
}

.o-section_image.-small {
  padding-bottom: 57.144%;
}

.o-section_image.-large {
  padding-bottom: 55%;
}

.o-section_image.-padding-left {
  margin-left: 7.5rem;
}

.o-section_image.-left {
  margin-right: 15rem;
}

@media (max-width: 1599px) {
  .o-section_image.-left {
    margin-left: -7.5rem;
  }
}

@media (min-width: 1600px) {
  .o-section_image.-left {
    margin-left: -9.5625rem;
  }
}

.o-section_image.-right {
  margin-left: 15rem;
}

@media (max-width: 1599px) {
  .o-section_image.-right {
    margin-right: -7.5rem;
  }
}

@media (min-width: 1600px) {
  .o-section_image.-right {
    margin-right: -9.5625rem;
  }
}

.o-section_image img {
  width: 100%;
}

.o-grid {
  margin-left: 0;
  letter-spacing: normal;
  font-size: 0;
}

.o-grid.-margin {
  margin-left: -3.75rem;
}

.o-grid_item {
  display: inline-block;
  padding-left: 0;
  width: 100%;
  vertical-align: top;
  font-size: 1rem;
}

@media (max-width: 699px) {
  .o-grid_item.-button {
    width: 100%;
  }
}

@media (min-width: 700px) and (max-width: 999px) {
  .o-grid_item.-button {
    margin-bottom: 60px;
  }
}

@media (min-width: 1000px) {
  .o-grid_item.-button {
    width: 18.75rem;
  }
}

@media (max-width: 699px) {
  .o-grid_item.-button-content {
    margin-bottom: 30px;
  }
}

@media (min-width: 700px) and (max-width: 999px) {
  .o-grid_item.-button-content {
    margin-bottom: 60px;
  }
}

@media (min-width: 1000px) {
  .o-grid_item.-button-content {
    width: calc(100% - 18.75rem);
  }
}

.o-grid.-margin .o-grid_item {
  padding-left: 3.75rem;
}

@media (min-width: 700px) {
  .o-grid_item.-half {
    width: 50%;
  }
}

@media (min-width: 700px) and (max-width: 1199px) {
  .o-grid_item.-half.-large {
    width: 100%;
  }
}

@media (min-width: 700px) and (max-width: 999px) {
  .o-grid_item.-half.-medium {
    width: 100%;
  }
}

@media (min-width: 700px) and (max-width: 1199px) {
  .o-grid_item.-third {
    width: 50%;
  }
}

@media (min-width: 1200px) {
  .o-grid_item.-third {
    width: 33.3333333333%;
  }
}

.o-form {
  padding-bottom: 11.25rem;
}

@media (max-width: 699px) {
  .o-form_item {
    margin-bottom: 35px;
  }
}

@media (min-width: 700px) {
  .o-form_item {
    margin-bottom: 2.9375rem;
  }
}

.o-form_fieldset {
  padding: 0;
  margin: 0;
  border: 0;
}

@media (max-width: 699px) {
  .o-form_fieldset {
    margin-bottom: 20px;
  }
}

@media (min-width: 700px) {
  .o-form_fieldset {
    margin-bottom: 3.75rem;
  }
}

.o-form_button {
  text-align: right;
}

.o-label {
  display: block;
  height: 100%;
  color: #b3b3b3;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 0.875rem;
  transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@media (max-width: 699px) {
  .o-label {
    font-size: 9px;
  }
}

@media (min-width: 700px) {
  .o-label {
    font-size: 0.5625rem;
  }
}

.o-input-wrap .o-label {
  position: absolute;
  bottom: 0;
  left: 0;
  transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), color 0.3s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.o-input:focus ~ .o-label, .o-select:focus ~ .o-label, .o-textarea:focus ~ .o-label, .o-label.is-active {
  -webkit-transform: translateY(-1.875rem);
      -ms-transform: translateY(-1.875rem);
          transform: translateY(-1.875rem);
}

.o-input.has-error ~ .o-label, .has-error.o-select ~ .o-label, .has-error.o-textarea ~ .o-label {
  color: #cc3d3d;
}

.o-input-wrap {
  position: relative;
}

.o-input, .o-select, .o-textarea {
  padding: 0.875rem;
  background-color: transparent;
  border-bottom: 1px solid #b3b3b3;
  transition: border-color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@media (max-width: 699px) {
  .o-input, .o-select, .o-textarea {
    font-size: 14px;
  }
}

@media (min-width: 700px) {
  .o-input, .o-select, .o-textarea {
    font-size: 0.875rem;
  }
}

.o-input::-webkit-input-placeholder, .o-select::-webkit-input-placeholder, .o-textarea::-webkit-input-placeholder {
  color: #b3b3b3;
}

.o-input:-ms-input-placeholder, .o-select:-ms-input-placeholder, .o-textarea:-ms-input-placeholder {
  color: #b3b3b3;
}

.o-input::placeholder, .o-select::placeholder, .o-textarea::placeholder {
  color: #b3b3b3;
}

.o-input.-search, .-search.o-select, .-search.o-textarea {
  background-color: transparent;
  color: #ffffff;
  font-weight: 700;
  border-bottom: none;
}

@media (max-width: 699px) {
  .o-input.-search, .-search.o-select, .-search.o-textarea {
    font-size: 26px;
  }
}

@media (min-width: 700px) {
  .o-input.-search, .-search.o-select, .-search.o-textarea {
    font-size: 3.75rem;
  }
}

.o-input.-search::-webkit-input-placeholder, .-search.o-select::-webkit-input-placeholder, .-search.o-textarea::-webkit-input-placeholder {
  color: #000000;
}

.o-input.-search:-ms-input-placeholder, .-search.o-select:-ms-input-placeholder, .-search.o-textarea:-ms-input-placeholder {
  color: #000000;
}

.o-input.-search::placeholder, .-search.o-select::placeholder, .-search.o-textarea::placeholder {
  color: #000000;
}

.-mobile .o-input.-search, .-mobile .-search.o-select, .-mobile .-search.o-textarea {
  font-size: 26px;
  padding: 0;
}

.o-input.-search.-light, .-search.-light.o-select, .-search.-light.o-textarea {
  color: #1e1e22;
}

.o-input.-search.-light::-webkit-input-placeholder, .-search.-light.o-select::-webkit-input-placeholder, .-search.-light.o-textarea::-webkit-input-placeholder {
  color: #b3b3b3;
}

.o-input.-search.-light:-ms-input-placeholder, .-search.-light.o-select:-ms-input-placeholder, .-search.-light.o-textarea:-ms-input-placeholder {
  color: #b3b3b3;
}

.o-input.-search.-light::placeholder, .-search.-light.o-select::placeholder, .-search.-light.o-textarea::placeholder {
  color: #b3b3b3;
}

.o-input.has-error, .has-error.o-select, .has-error.o-textarea {
  border-color: #cc3d3d;
}

.o-input:focus, .o-select:focus, .o-textarea:focus {
  outline: none;
}

.o-input-line {
  display: block;
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  border-bottom: 1px solid #1e1e22;
  -webkit-transform: scaleX(0);
      -ms-transform: scaleX(0);
          transform: scaleX(0);
  transition: -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  -webkit-transform-origin: center left;
      -ms-transform-origin: center left;
          transform-origin: center left;
}

.o-input:focus ~ .o-input-line, .o-select:focus ~ .o-input-line, .o-textarea:focus ~ .o-input-line {
  -webkit-transform: scaleX(1);
      -ms-transform: scaleX(1);
          transform: scaleX(1);
}

.o-input-lines::before, .o-input-lines::after {
  content: "";
  position: absolute;
  bottom: 0;
  border-right: 1px solid #b3b3b3;
  height: 0.375rem;
  transition: border-color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.o-input.has-error ~ .o-input-lines::before, .has-error.o-select ~ .o-input-lines::before, .has-error.o-textarea ~ .o-input-lines::before, .o-input.has-error ~ .o-input-lines::after, .has-error.o-select ~ .o-input-lines::after, .has-error.o-textarea ~ .o-input-lines::after {
  border-color: #cc3d3d;
}

.o-input-lines::before {
  left: 0;
  transition-delay: 0.3s;
}

.o-input-lines::after {
  right: 0;
}

.o-input:focus ~ .o-input-lines::before, .o-select:focus ~ .o-input-lines::before, .o-textarea:focus ~ .o-input-lines::before, .o-input:focus ~ .o-input-lines::after, .o-select:focus ~ .o-input-lines::after, .o-textarea:focus ~ .o-input-lines::after {
  border-color: #1e1e22;
}

.o-input:focus ~ .o-input-lines::before, .o-select:focus ~ .o-input-lines::before, .o-textarea:focus ~ .o-input-lines::before {
  transition-delay: 0s;
}

.o-input:focus ~ .o-input-lines::after, .o-select:focus ~ .o-input-lines::after, .o-textarea:focus ~ .o-input-lines::after {
  transition-delay: 0.3s;
}

.o-checkbox, .o-radio {
  position: absolute;
  width: 0;
  opacity: 0;
}

.o-checkbox:checked + .o-checkbox-label::after, .o-radio:checked + .o-checkbox-label::after, .o-checkbox:checked + .o-radio-label::after, .o-radio:checked + .o-radio-label::after {
  -webkit-transform: scale(1);
      -ms-transform: scale(1);
          transform: scale(1);
}

.o-checkbox-label, .o-radio-label {
  position: relative;
  display: inline-block;
  margin-right: 0.5em;
  line-height: 1.4;
  margin-right: 4.0625rem;
  cursor: pointer;
  padding-top: 0.125rem;
}

@media (max-width: 699px) {
  .o-checkbox-label, .o-radio-label {
    font-size: 12px;
    padding-left: 27px;
  }
}

@media (min-width: 700px) {
  .o-checkbox-label, .o-radio-label {
    font-size: 0.875rem;
    padding-left: 1.1875rem;
  }
}

.o-checkbox-label.-uppsercase, .-uppsercase.o-radio-label {
  text-transform: uppercase;
}

.o-checkbox-label::before, .o-radio-label::before, .o-checkbox-label::after, .o-radio-label::after {
  position: absolute;
  top: 50%;
  left: 0;
  display: inline-block;
  padding: 0;
  content: "";
  border: 1px solid;
  transition: border-color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@media (max-width: 699px) {
  .o-checkbox-label::before, .o-radio-label::before, .o-checkbox-label::after, .o-radio-label::after {
    width: 12px;
    height: 12px;
    margin-top: -6px;
  }
}

@media (min-width: 700px) {
  .o-checkbox-label::before, .o-radio-label::before, .o-checkbox-label::after, .o-radio-label::after {
    margin-top: -0.28125rem;
    width: 0.5625rem;
    height: 0.5625rem;
  }
}

.o-checkbox-label::after, .o-radio-label::after {
  width: 0;
  height: 0;
  border-style: solid;
  border-color: #1e1e22 transparent transparent transparent;
  -webkit-transform: scale(0);
      -ms-transform: scale(0);
          transform: scale(0);
  -webkit-transform-origin: top left;
      -ms-transform-origin: top left;
          transform-origin: top left;
  transition: -webkit-transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@media (max-width: 699px) {
  .o-checkbox-label::after, .o-radio-label::after {
    border-width: 12px 12px 0 0;
  }
}

@media (min-width: 700px) {
  .o-checkbox-label::after, .o-radio-label::after {
    border-width: 0.5625rem 0.5625rem 0 0;
  }
}

.o-checkbox-label.has-error::before, .has-error.o-radio-label::before {
  border-color: #cc3d3d;
}

.o-checkbox-label_text {
  display: inline-block;
  transition: -webkit-transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
}

.o-checkbox-label:hover .o-checkbox-label_text, .o-radio-label:hover .o-checkbox-label_text {
  -webkit-transform: translateX(0.3125rem);
      -ms-transform: translateX(0.3125rem);
          transform: translateX(0.3125rem);
}

.o-radio-label::before, .o-radio-label::after {
  border-radius: 50%;
  width: 12px;
  height: 12px;
}

.o-radio-label::after {
  background-image: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20version%3D%221.1%22%20x%3D%220%22%20y%3D%220%22%20width%3D%2213%22%20height%3D%2213%22%20viewBox%3D%220%200%2013%2013%22%20enable-background%3D%22new%200%200%2013%2013%22%20xml%3Aspace%3D%22preserve%22%3E%3Ccircle%20fill%3D%22%23424242%22%20cx%3D%226.5%22%20cy%3D%226.5%22%20r%3D%226.5%22%2F%3E%3C%2Fsvg%3E");
  background-size: 6px;
  background-position: center;
  background-repeat: no-repeat;
  -webkit-transform: scale(0);
      -ms-transform: scale(0);
          transform: scale(0);
  -webkit-transform-origin: center;
      -ms-transform-origin: center;
          transform-origin: center;
  transition: -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  border: none;
}

.o-radio:checked + .o-radio-label::after {
  -webkit-transform: scale(1);
      -ms-transform: scale(1);
          transform: scale(1);
}

.o-select {
  position: relative;
  z-index: 1;
  padding-right: 2.5rem;
}

.o-select:focus {
  border-bottom-color: #1e1e22;
}

.o-select-wrap {
  position: relative;
}

.o-select-wrap::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 2;
  width: 2.5rem;
  background-image: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20version%3D%221.1%22%20x%3D%220%22%20y%3D%220%22%20width%3D%2213%22%20height%3D%2211.3%22%20viewBox%3D%220%200%2013%2011.3%22%20enable-background%3D%22new%200%200%2013%2011.3%22%20xml%3Aspace%3D%22preserve%22%3E%3Cpolygon%20fill%3D%22%23b3b3b3%22%20points%3D%226.5%2011.3%203.3%205.6%200%200%206.5%200%2013%200%209.8%205.6%20%22%2F%3E%3C%2Fsvg%3E");
  background-position: center;
  background-size: 10px;
  background-repeat: no-repeat;
  content: "";
  pointer-events: none;
}

.o-textarea-wrap {
  position: relative;
}

.o-textarea {
  min-height: 9.375rem;
}

.o-button {
  position: relative;
  display: inline-block;
  text-align: center;
  border: 1px solid #1e1e22;
  white-space: nowrap;
  font-size: 0;
  transition: background-color 0.3s cubic-bezier(0.4, 0, 0.2, 1), color 0.45s cubic-bezier(0.4, 0, 0.2, 1) 0.075s;
}

.o-button:before {
  display: inline-block;
  height: 100%;
  content: "";
  vertical-align: middle;
}

.o-button > * {
  display: inline-block;
  vertical-align: middle;
  white-space: normal;
  font-size: 1rem;
}

@media (max-width: 699px) {
  .o-button {
    height: 60px;
    padding: 0 20px;
  }
}

@media (min-width: 700px) {
  .o-button {
    height: 3.75rem;
    padding: 0 1.875rem;
  }
}

.o-button::after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #1e1e22;
  -webkit-transform: scaleX(0);
      -ms-transform: scaleX(0);
          transform: scaleX(0);
  -webkit-transform-origin: center left;
      -ms-transform-origin: center left;
          transform-origin: center left;
  transition: -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1) 0.075s;
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1) 0.075s;
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1) 0.075s, -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1) 0.075s;
}

.o-button:hover {
  color: #ffffff;
  transition-delay: 0s;
}

.o-button:hover::after {
  -webkit-transform: scaleX(1);
      -ms-transform: scaleX(1);
          transform: scaleX(1);
  transition-delay: 0s;
}

@media (min-width: 1200px) {
  .o-button.-anim {
    border-color: transparent;
  }
}

.o-button.-left::after {
  -webkit-transform-origin: center right;
      -ms-transform-origin: center right;
          transform-origin: center right;
}

.o-button.-white {
  border-color: #ffffff;
}

.o-button.-white::after {
  background-color: #ffffff;
}

.o-button.-white:hover {
  color: #000000;
}

@media (max-width: 699px) {
  .o-button.-width {
    width: 100%;
  }
}

@media (min-width: 700px) {
  .o-button.-width {
    width: 15rem;
  }
}

.o-button.-form {
  width: 11.25rem;
}

.o-button.-form:focus {
  color: #ffffff;
  transition-delay: 0s;
}

.o-button.-form:focus::after {
  -webkit-transform: scaleX(1);
      -ms-transform: scaleX(1);
          transform: scaleX(1);
  transition-delay: 0s;
}

.o-button.-square {
  padding: 0;
}

@media (max-width: 699px) {
  .o-button.-square {
    width: 60px;
  }
}

@media (min-width: 700px) {
  .o-button.-square {
    width: 3.75rem;
  }
}

.o-button-group .o-button + .o-button {
  border-left: none;
}

@media (max-width: 699px) {
  .o-button.-padding {
    padding: 1.25rem;
  }
}

@media (min-width: 700px) {
  .o-button.-padding {
    padding: 1.25rem 2.5rem;
  }
}

.o-button_label {
  display: inline-block;
  position: relative;
  transition: -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  -webkit-transform: translateX(0);
      -ms-transform: translateX(0);
          transform: translateX(0);
  line-height: 1.4;
  z-index: 2;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  font-weight: 500;
  font-size: 0.75rem;
}

.o-button:hover .o-button_label {
  -webkit-transform: translateX(0.5rem);
      -ms-transform: translateX(0.5rem);
          transform: translateX(0.5rem);
  transition-delay: 0.075s;
}

.o-button.-left:hover .o-button_label {
  -webkit-transform: translateX(-0.5rem);
      -ms-transform: translateX(-0.5rem);
          transform: translateX(-0.5rem);
}

.o-button.-square:hover .o-button_label {
  -webkit-transform: translateX(0.375rem);
      -ms-transform: translateX(0.375rem);
          transform: translateX(0.375rem);
}

.o-button.-left.-square:hover .o-button_label {
  -webkit-transform: translateX(-0.375rem);
      -ms-transform: translateX(-0.375rem);
          transform: translateX(-0.375rem);
}

.o-button-group {
  margin-left: 0;
  letter-spacing: normal;
  font-size: 0;
}

.o-button_icon {
  position: relative;
  width: 1.1875rem;
  height: 1.1875rem;
  fill: #1e1e22;
  transition: fill 0.45s cubic-bezier(0.4, 0, 0.2, 1) 0.075s;
}

.o-button.-white .o-button_icon {
  fill: #ffffff;
}

.o-button:hover .o-button_icon {
  fill: #f6f6f6;
  transition-delay: 0s;
}

.o-button.-white:hover .o-button_icon {
  fill: #1e1e22;
}

.o-button_line::before, .o-button_line::after {
  content: "";
  position: absolute;
  background-color: #1e1e22;
}

.is-mobile .o-button_line::before, .is-mobile .o-button_line::after {
  display: none;
}

.o-button_line::before {
  width: 1px;
  top: 0;
  bottom: 0;
  -webkit-transform: scaleY(0);
      -ms-transform: scaleY(0);
          transform: scaleY(0);
  transition: -webkit-transform 0.15s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.15s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.15s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.15s cubic-bezier(0.4, 0, 0.2, 1);
}

.o-button_line::after {
  height: 1px;
  right: 0;
  left: 0;
  -webkit-transform: scaleX(0);
      -ms-transform: scaleX(0);
          transform: scaleX(0);
  transition: -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
}

.o-button_line:first-of-type::before {
  left: 0;
  -webkit-transform-origin: center bottom;
      -ms-transform-origin: center bottom;
          transform-origin: center bottom;
}

.o-button_line:first-of-type::after {
  top: 0;
  -webkit-transform-origin: center left;
      -ms-transform-origin: center left;
          transform-origin: center left;
}

.o-button_line:last-of-type::before {
  right: 0;
  -webkit-transform-origin: center top;
      -ms-transform-origin: center top;
          transform-origin: center top;
}

.o-button_line:last-of-type::after {
  bottom: 0;
  -webkit-transform-origin: center right;
      -ms-transform-origin: center right;
          transform-origin: center right;
}

.o-button.is-inview .o-button_line::before {
  -webkit-transform: scaleY(1);
      -ms-transform: scaleY(1);
          transform: scaleY(1);
}

.o-button.is-inview .o-button_line::after {
  -webkit-transform: scaleX(1);
      -ms-transform: scaleX(1);
          transform: scaleX(1);
}

.o-button.is-inview .o-button_line:first-of-type::before {
  transition-delay: 1.15s;
}

.o-button.is-inview .o-button_line:first-of-type::after {
  transition-delay: 0.1s;
}

.o-button.is-inview .o-button_line:last-of-type::before {
  transition-delay: 0.55s;
}

.o-button.is-inview .o-button_line:last-of-type::after {
  transition-delay: 0.7s;
}

.c-header-home_footer {
  z-index: 3;
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
}

.c-header-home_controls, .c-header-home_buttons {
  margin-left: 0;
  letter-spacing: normal;
  font-size: 0;
  transition: -webkit-transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), -webkit-transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  -webkit-transform: translate3d(0, 100%, 0);
          transform: translate3d(0, 100%, 0);
}

@media (max-width: 699px) {
  .c-header-home_controls, .c-header-home_buttons {
    padding-bottom: 40px;
  }
}

@media (min-width: 700px) {
  .c-header-home_controls, .c-header-home_buttons {
    padding-bottom: 5.625rem;
  }
}

@media (min-width: 700px) and (max-width: 749px) {
  .c-header-home_controls, .c-header-home_buttons {
    padding-bottom: 3.75rem;
  }
}

.is-loaded .c-header-home_controls, .is-loaded .c-header-home_buttons {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

body[data-route-option="prev-section"] .c-header-home_controls, body[data-route-option="prev-section"] .c-header-home_buttons, body[data-route-option="next-section"] .c-header-home_controls, body[data-route-option="next-section"] .c-header-home_buttons {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.c-header-home_controls {
  transition-delay: 0.65s;
}

@media (min-width: 700px) {
  .c-header-home_controls {
    float: left;
  }
}

@media (max-width: 999px) {
  .c-header-home_controls.-nomobile {
    //display: none;
  }
}

.c-header-home_buttons {
  transition-delay: 0.75s;
}

@media (max-width: 699px) {
  .c-header-home_buttons {
    margin-left: -20px;
    margin-right: -20px;
  }
}

@media (min-width: 1000px) {
  .c-header-home_buttons {
    float: right;
  }
}

@media (max-width: 699px) {
  .c-header-home_button {
    width: 50% !important;
  }
}

@media (min-width: 700px) {
  .c-header-home_button {
    width: 15.625rem;
  }
}
</style>
<body class="main-layout">

<div id="wrapper">
  <section class="slideshow" id="js-header">
    
    <div class="slideshow__slide js-slider-home-slide is-current" data-slide="1">
		<div class="slideshow__slide-background-parallax background-absolute js-parallax" data-speed="-1" data-position="top" data-target="#js-header">
			<div class="slideshow__slide-background-load-wrap background-absolute">
				<div class="slideshow__slide-background-load background-absolute">
					<div class="slideshow__slide-background-wrap background-absolute">
						<div class="slideshow__slide-background background-absolute">
							<div class="slideshow__slide-image-wrap background-absolute">
								<div class="slideshow__slide-image background-absolute" style="background-image: url('images/hakkımızda/1.jpg?auto=compress&cs=tinysrgb&h=1080&w=1920');"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slideshow__slide-caption">
			<div class="slideshow__slide-caption-text">
				<div class="container js-parallax" data-speed="2" data-position="top" data-target="#js-header">
					<h3 class="slideshow__slide-caption-title">Sağlıkta Güvenle 28 Yıl</h3>
				</div>
			</div>
		</div>
	</div>
    
    <div class="slideshow__slide js-slider-home-slide is-next" data-slide="2">
		<div class="slideshow__slide-background-parallax background-absolute js-parallax" data-speed="-1" data-position="top" data-target="#js-header">
			<div class="slideshow__slide-background-load-wrap background-absolute">
				<div class="slideshow__slide-background-load background-absolute">
					<div class="slideshow__slide-background-wrap background-absolute">
						<div class="slideshow__slide-background background-absolute">
							<div class="slideshow__slide-image-wrap background-absolute">
								<div class="slideshow__slide-image background-absolute" style="background-image: url('images/hakkımızda/10.jpg?auto=compress&cs=tinysrgb&dpr=2&h=1080&w=1920');"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slideshow__slide-caption">
			<div class="slideshow__slide-caption-text">
				<div class="container js-parallax" data-speed="2" data-position="top" data-target="#js-header">
				</div>
			</div>
		</div>
	</div>
    
    <div class="slideshow__slide js-slider-home-slide is-prev" data-slide="3">
		<div class="slideshow__slide-background-parallax background-absolute js-parallax" data-speed="-1" data-position="top" data-target="#js-header">
			<div class="slideshow__slide-background-load-wrap background-absolute">
				<div class="slideshow__slide-background-load background-absolute">
					<div class="slideshow__slide-background-wrap background-absolute">
						<div class="slideshow__slide-background background-absolute">
							<div class="slideshow__slide-image-wrap background-absolute">
								<div class="slideshow__slide-image background-absolute" style="background-image: url('images/hakkımızda/19.jpg?auto=compress&cs=tinysrgb&h=1080&w=1920');"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slideshow__slide-caption">
			<div class="slideshow__slide-caption-text">
            <div class="container js-parallax" data-speed="2" data-position="top" data-target="#js-header">
				</div>
			</div>
		</div>
	</div>

    <div class="slideshow__slide js-slider-home-slide is-prev" data-slide="3">
		<div class="slideshow__slide-background-parallax background-absolute js-parallax" data-speed="-1" data-position="top" data-target="#js-header">
			<div class="slideshow__slide-background-load-wrap background-absolute">
				<div class="slideshow__slide-background-load background-absolute">
					<div class="slideshow__slide-background-wrap background-absolute">
						<div class="slideshow__slide-background background-absolute">
							<div class="slideshow__slide-image-wrap background-absolute">
								<div class="slideshow__slide-image background-absolute" style="background-image: url('images/hakkımızda/25.jpg?auto=compress&cs=tinysrgb&h=1080&w=1920');"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slideshow__slide-caption">
			<div class="slideshow__slide-caption-text">
				<div class="container js-parallax" data-speed="2" data-position="top" data-target="#js-header">
				</div>
			</div>
		</div>
	</div>
    
    <div class="c-header-home_footer">
		<div class="o-container">
			<div class="c-header-home_controls -nomobile o-button-group">
				<div class="js-parallax is-inview" data-speed="1" data-position="top" data-target="#js-header">
					<button class="o-button -white -square -left js-slider-home-button js-slider-home-prev" type="button">
						<span class="o-button_label">
							<svg class="o-button_icon" role="img"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-prev"></use></svg>
						</span>
					</button>
					<button class="o-button -white -square js-slider-home-button js-slider-home-next" type="button">
						<span class="o-button_label">
							<svg class="o-button_icon" role="img"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-next"></use></svg>
						</span>
					</button>
				</div>
			</div>
		</div>
	</div>
   
    
  </section>
<div>
  
<svg xmlns="http://www.w3.org/2000/svg">
    <symbol viewBox="0 0 18 18" id="arrow-next">
        <path id="arrow-next-arrow.svg" d="M12.6,9L4,17.3L4.7,18l8.5-8.3l0,0L14,9l0,0l-0.7-0.7l0,0L4.7,0L4,0.7L12.6,9z"/>
    </symbol>
    <symbol viewBox="0 0 18 18" id="arrow-prev">
        <path id="arrow-prev-arrow.svg" d="M14,0.7L13.3,0L4.7,8.3l0,0L4,9l0,0l0.7,0.7l0,0l8.5,8.3l0.7-0.7L5.4,9L14,0.7z"/>
    </symbol>
</svg>

   <script>const $window = $(window);
const $body = $('body');

class Slideshow {
	constructor (userOptions = {}) {
    const defaultOptions = {
      $el: $('.slideshow'),
      showArrows: false,
      showPagination: true,
      duration: 10000,
      autoplay: true
    }
    
    let options = Object.assign({}, defaultOptions, userOptions);
    
		this.$el = options.$el;
		this.maxSlide = this.$el.find($('.js-slider-home-slide')).length;
    this.showArrows = this.maxSlide > 1 ? options.showArrows : false;
    this.showPagination = options.showPagination;
		this.currentSlide = 1;
		this.isAnimating = false;
		this.animationDuration = 1200;
		this.autoplaySpeed = options.duration;
		this.interval;
		this.$controls = this.$el.find('.js-slider-home-button');
    this.autoplay = this.maxSlide > 1 ? options.autoplay : false;

		this.$el.on('click', '.js-slider-home-next', (event) => this.nextSlide());
		this.$el.on('click', '.js-slider-home-prev', (event) => this.prevSlide());
    this.$el.on('click', '.js-pagination-item', event => {
      if (!this.isAnimating) {
        this.preventClick();
  this.goToSlide(event.target.dataset.slide);
      }
    });

		this.init();
	}
  
  init() {
    this.goToSlide(1);
    if (this.autoplay) {
      this.startAutoplay();
    }
    
    if (this.showPagination) {
      let paginationNumber = this.maxSlide;
      let pagination = '<div class="pagination"><div class="container">';
      
      for (let i = 0; i < this.maxSlide; i++) {
        let item = `<span class="pagination__item js-pagination-item ${ i === 0 ? 'is-current' : ''}" data-slide=${i + 1}>${i + 1}</span>`;
        pagination  = pagination + item;
      }
      
      pagination = pagination + '</div></div>';
      
      this.$el.append(pagination);
    }
  }
  
  preventClick() {
		this.isAnimating = true;
		this.$controls.prop('disabled', true);
		clearInterval(this.interval);

		setTimeout(() => {
			this.isAnimating = false;
			this.$controls.prop('disabled', false);
      if (this.autoplay) {
			  this.startAutoplay();
      }
		}, this.animationDuration);
	}

	goToSlide(index) {    
    this.currentSlide = parseInt(index);
    
    if (this.currentSlide > this.maxSlide) {
      this.currentSlide = 1;
    }
    
    if (this.currentSlide === 0) {
      this.currentSlide = this.maxSlide;
    }
    
    const newCurrent = this.$el.find('.js-slider-home-slide[data-slide="'+ this.currentSlide +'"]');
    const newPrev = this.currentSlide === 1 ? this.$el.find('.js-slider-home-slide').last() : newCurrent.prev('.js-slider-home-slide');
    const newNext = this.currentSlide === this.maxSlide ? this.$el.find('.js-slider-home-slide').first() : newCurrent.next('.js-slider-home-slide');
    
    this.$el.find('.js-slider-home-slide').removeClass('is-prev is-next is-current');
    this.$el.find('.js-pagination-item').removeClass('is-current');
    
		if (this.maxSlide > 1) {
      newPrev.addClass('is-prev');
      newNext.addClass('is-next');
    }
    
    newCurrent.addClass('is-current');
    this.$el.find('.js-pagination-item[data-slide="'+this.currentSlide+'"]').addClass('is-current');
  }
  
  nextSlide() {
    this.preventClick();
    this.goToSlide(this.currentSlide + 1);
	}
   
	prevSlide() {
    this.preventClick();
    this.goToSlide(this.currentSlide - 1);
	}

	startAutoplay() {
		this.interval = setInterval(() => {
			if (!this.isAnimating) {
				this.nextSlide();
			}
		}, this.autoplaySpeed);
	}

	destroy() {
		this.$el.off();
	}
}

(function() {
	let loaded = false;
	let maxLoad = 3000;  
  
	function load() {
		const options = {
      showPagination: true
    };

    let slideShow = new Slideshow(options);
	}
  
	function addLoadClass() {
		$body.addClass('is-loaded');

		setTimeout(function() {
			$body.addClass('is-animated');
		}, 600);
	}
  
	$window.on('load', function() {
		if(!loaded) {
			loaded = true;
			load();
		}
	});
  
	setTimeout(function() {
		if(!loaded) {
			loaded = true;
			load();
		}
	}, maxLoad);

	addLoadClass();
})();
</script>

</body>
<?php include("inc/footer.php");?>
</html>