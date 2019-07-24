import React from "react";
import ReactDOM from "react-dom";
import { Provider } from "react-redux";

import UserProfile from "./app/UserProfile";
import store from './app/store'

ReactDOM.render(
  <Provider store={store}>
    <UserProfile />
  </Provider>,
  document.querySelector("#root")
);
