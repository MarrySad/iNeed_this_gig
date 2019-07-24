import React, { Component } from "react";

export default class UserInfo extends Component {
  render() {
    return (
      <div className="row justify-content-between">
        <h2 className="col-12">{this.props.user.userName}</h2>
        <div className="col-4 align-self-start">
          <img className="userAv" src={this.props.user.userAv} />
          <button className="btn round-btn editUserAv" type="button"/>
        </div>
        <p className="col-7 border">{this.props.user.description}</p>
      </div>
    );
  }
}
