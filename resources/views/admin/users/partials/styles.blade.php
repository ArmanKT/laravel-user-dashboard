<style>/* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 40px;
      height: 23px;
    }
    
    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 15px;
      width: 15px;
      left: 4px;
      top: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #5c76fb;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #5c76fb;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(16px);
      -ms-transform: translateX(16px);
      transform: translateX(16px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 50px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }</style>