/* main.js */

'use strict'

import React from 'react'
import ReactDOM from 'react-dom'

import './style.css'

import Score from './scoreModule/index.jsx'


ReactDOM.render(
  <div className="aac-container">
    <Score />
  </div>
  ,
  document.getElementById('advancetool')
);
