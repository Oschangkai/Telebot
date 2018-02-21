import TelegramBot from "node-telegram-bot-api";
import vars from "./vars";

const KaiYiBot = new TelegramBot(vars.TKN_KYB, vars.OPTS);
KaiYiBot.setWebHook(`${vars.URL}:443/bot${vars.TKN_KYB}`);

KaiYiBot.onText(/\/test/, (msg) => {
  const chatId = msg.chat.id;

  KaiYiBot.sendMessage(chatId, "Working!");
})

console.log("App Starts!");