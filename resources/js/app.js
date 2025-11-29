import "./bootstrap";
import "./layout/index.js";
import "./preloader.js";
import "./components/window.js";
import "./components/dropdown.js";
import "./components/input-dropdown.js";
import "./pages/inventory.js";
import "./pages/transactions.js";
import { QueryClient } from "./query-client.js";

setTimeout(() => QueryClient.publish("transaction"), 0);
