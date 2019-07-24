import React, { Component } from "react";
import TrackItem from "./TrackItem";

export default class UserTracks extends Component {
  render() {
    return (
      <div>
        <div className="d-flex align-items-center">
          <div className="decorationBlock bg-button" />
          <h2>Треки</h2>
        </div>
        <div className="tracksWrap row justify-content-start">
        <TrackItem />
        <TrackItem />
        <TrackItem />
        <TrackItem />
        <TrackItem />
        <TrackItem />
        <TrackItem />
        <TrackItem />
        <div className="addTrackWrap col d-flex justify-content-center align-items-center">
          <button type="button" className="addTrack btn round-btn bg-button" />
        </div>
        </div>
      </div>
    );
  }
}
