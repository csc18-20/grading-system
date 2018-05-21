<nav class="navbar navbar-expand-lg fixed-top " style="background: #f7f7f7;" id="navbar-style-light">
    <a class="navbar-brand p-0" target="_blank">
        <span>Grading System<small style="font-size: 12px; color:#004d29;">(CGPA project)</small></span>
    </a>
      
          <button style="background: white;" class="navbar-toggler"
                   type="button" 
                   data-toggle="collapse" 
                   data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="border:1px solid grey;"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              @guest
                   <li class="nav-item mx-1 active" style="margin-left: 40px;">
                     <a class="nav-link" href="/home">Home</a>
                  </li>
                  <li class="nav-item"> 
                    <a class="nav-link" id="buy-button" href="">Administrator</a>
                </li>      
            @else
              <li class="nav-item mx-1 dropdown">
                <a class="nav-link dropdown-toggle" 
                   id="templates-dropdown"
                    href="#" role="button" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false">Templates</a>
                <div class="dropdown-menu" aria-labelledby="templates-dropdown">
                    <a class="dropdown-item" href="template-1.html">Template #1</a>
                    <a class="dropdown-item">Template #2</a>
                    <a class="dropdown-item">Template #3</a>
                </div>
              </li>
              <li class="nav-item mx-1">
                <a class="nav-link disabled" href="/spreadsheets">SpreadSheet</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link " href="/students">students</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link disabled" href="/logout">LOGout</a>
              </li>
              @endguest
            </ul>
          </div>
        </nav>