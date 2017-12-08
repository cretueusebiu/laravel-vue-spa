import Vue from 'vue'
import fontawesome from '@fortawesome/fontawesome'
import FontAwesomeIcon from '@fortawesome/vue-fontawesome'

Vue.component('fa', FontAwesomeIcon)

// import { } from '@fortawesome/fontawesome-free-regular'

import {
  faUser, faLock, faSignOutAlt, faCog
} from '@fortawesome/fontawesome-free-solid'

import { faGithub } from '@fortawesome/fontawesome-free-brands'

fontawesome.library.add(
  faUser, faLock, faSignOutAlt, faCog, faGithub
)
