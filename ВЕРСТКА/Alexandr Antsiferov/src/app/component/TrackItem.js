import React, { Component } from "react";

export default class TrackItem extends Component {
  render() {
    return (
      <div className="trackItemWrap justify-content-center col">
        <div className="cover d-flex justify-content-center align-items-center">
          <button type="button" className="btn round-btn playButton bg-button" />
        </div>
        <span className="trackName">Название</span>
      </div>
    );
  }
}
