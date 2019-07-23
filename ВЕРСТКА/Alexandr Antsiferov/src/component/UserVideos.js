import React, { Component } from "react";
import VideoItem from './VideoItem'

export default class UserVideos extends Component {
  render() {
    return (
      <div>
        <div className="d-flex align-items-center">
          <div className="decorationBlock bg-button" />
          <h2>Видео</h2>
        </div>
        <div className="tracksWrap row justify-content-start">
          <VideoItem/>
          <VideoItem/>
          <VideoItem/>
          <VideoItem/>
          <VideoItem/>
          <VideoItem/>
          <div className="addTrackWrap col d-flex justify-content-center align-items-center">
            <button
              type="button"
              className="addTrack btn round-btn bg-button"
            />
          </div>
        </div>
      </div>
    );
  }
}
