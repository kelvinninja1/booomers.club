
class AdminDashboard extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: null,
    };
  }

  render() {
    return (
      <div class="">
          <AdminDashboardCards value="Admin"/>
          <div class="row">
            <div class="col-md-8">
              <AdminDashboardCharts />
            </div>
            <div class="col-md-4">
            <AdminDashboardActivityList />
            </div>
          </div>
      </div>

    );
  }
}

class AdminDashboardTitle extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: null,
    };
  }

  render() {
    return (
      <div class="app-page-title">
          <div class="page-title-wrapper">
              <div class="page-title-heading">
                  <div class="page-title-icon">
                      <i class="fa fa-home icon-gradient bg-mean-fruit">
                      </i>
                  </div>
                  <div>Admin Dashboard
                      <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                      </div>
                  </div>
              </div>
              <div class="page-title-actions">
                  <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                      <i class="fa fa-star"></i>
                  </button>
                  <div class="d-inline-block dropdown">
                      <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                          <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-business-time fa-w-20"></i>
                          </span>
                          Buttons
                      </button>
                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a href="javascript:void(0);" class="nav-link">
                                      <i class="nav-link-icon lnr-inbox"></i>
                                      <span>
                                          Inbox
                                      </span>
                                      <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="javascript:void(0);" class="nav-link">
                                      <i class="nav-link-icon lnr-book"></i>
                                      <span>
                                          Book
                                      </span>
                                      <div class="ml-auto badge badge-pill badge-danger">5</div>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="javascript:void(0);" class="nav-link">
                                      <i class="nav-link-icon lnr-picture"></i>
                                      <span>
                                          Picture
                                      </span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a disabled href="javascript:void(0);" class="nav-link disabled">
                                      <i class="nav-link-icon lnr-file-empty"></i>
                                      <span>
                                          File Disabled
                                      </span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
      </div>

    );
  }
}

class AdminDashboardCards extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: null,
    };
  }

  render() {
    return (
      <div class="row">
          <div class="col-lg-6 col-xl-4">
              <div class="card mb-3 widget-content">
                  <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                          <div class="widget-heading">Total Transactions</div>
                          <div class="widget-subheading">Last year transactions</div>
                      </div>
                      <div class="widget-content-right">
                          <div class="widget-numbers text-success"><span>1896</span></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-xl-4">
              <div class="card mb-3 widget-content">
                  <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                          <div class="widget-heading">Clients</div>
                          <div class="widget-subheading">Total Clients Profit</div>
                      </div>
                      <div class="widget-content-right">
                          <div class="widget-numbers text-primary"><span>$ 568</span></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-xl-4">
              <div class="card mb-3 widget-content">
                  <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                          <div class="widget-heading">Revenue</div>
                          <div class="widget-subheading">Total revenue streams</div>
                      </div>
                      <div class="widget-content-right">
                          <div class="widget-numbers text-warning"><span>$14M</span></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    );
  }
}

class AdminDashboardCharts extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: null,
    };
  }

  render() {
    return (
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Gross Sales</h5>
                <canvas id="canvas"></canvas>
            </div>
        </div>

    );
  }
}


class AdminDashboardActivityList extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: null,
    };
  }

  render() {
    return (
          <div class="main-card mb-3 card">
              <div class="card-body"><h5 class="card-title">Most Recent Activities</h5>
                  <ul class="list-group">
                      <li class="active list-group-item"><h5 class="list-group-item-heading">List group item heading</h5>
                          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p></li>
                      <li class="list-group-item"><h5 class="list-group-item-heading">List group item heading</h5>
                          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p></li>
                      <li class="list-group-item"><h5 class="list-group-item-heading">List group item heading</h5>
                          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p></li>
                  </ul>
              </div>
          </div>

    );
  }
}
