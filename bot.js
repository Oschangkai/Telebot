import TelegramBot from "node-telegram-bot-api";
import vars from "./vars";

const KaiYiBot = new TelegramBot(vars.TKN_KYB, vars.OPTS);
KaiYiBot.setWebHook(`${vars.URL}:443/bot${vars.TKN_KYB}`);

// const forYZUKaiYiBot = new TelegramBot(vars.TKN_FYZKYB, vars.OPTS);
// forYZUKaiYiBot.setWebHook(`${vars.URL}:443/bot${vars.TKN_FYZKYB}`);

module.exports = { KaiYiBot };