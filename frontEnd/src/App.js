import logo from './logo.svg';
import './App.css';
import Navbar from './components/Navbar';
import ForumScreen from './screens/forum_screen';
import {Routes,Route,Link} from 'react-router-dom'
import ProposScreen from './screens/propos_screen';

function App() {
  return (
    <div className='container'>
      <Routes>
      <Route path='/forum' element={<ForumScreen/>}/>
        <Route path='/propos' element={<ProposScreen/>}/>
      </Routes>
    </div>
  );
}

export default App;
