/**
 * Author: Stefan Haack (https://shaack.com)
 * Date: 2022-01-07
 */

export class ShellWrite {
    constructor(context, text) {
        this.content = text
        context.innerHTML = this.content
        context.style.visibility = "visible"
        context.innerHTML = ""
        let content = ""
        const delay = 60
        for (let i = 0; i < this.content.length; i++) {
            setTimeout(() => {
                const char = this.content.charAt(i)
                if(char === "\n") {
                    content += "<br>"
                } else {
                    content += this.content.charAt(i)
                }
                context.innerHTML = content + "_"
            }, delay * i)
        }
        setTimeout(() => {
            context.innerHTML = content
        }, delay * this.content.length)
    }
}