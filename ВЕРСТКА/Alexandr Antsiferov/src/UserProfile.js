import React, { Component } from "react";
import ReactDOM from "react-dom";
import UserInfo from "./component/UserInfo";
import UserTrack from "./component/UserTracks";
import UserVideos from "./component/UserVideos";
import Timetable from "./component/timetable/Timetable";



export default class UserProfile extends Component {
  constructor(props) {
    super(props);
    this.state = {
      user: {}
    };
  }

  render() {
    return (
      <div className="container background">
        <UserInfo user={this.state.user} />
        <UserTrack/>
        <UserVideos/>
        <Timetable/>
      </div>
    );
  }

  componentDidMount() {
    this.setState({
      user: {
        userName: "Имя пользователя",
        userAv: "./img/user/user_ava.jpg",
        description:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      }
    });
  }
}

ReactDOM.render(<UserProfile />, document.querySelector("#root"));
