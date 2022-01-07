/**
 * Author: Stefan Haack (https://shaack.com)
 * Date: 2022-01-07
 */

export class ShellWrite {
    constructor(context) {
        this.content = context.innerHTML
        context.style.visibility = "visible"
        context.innerHTML = ""
        let content = ""
        const delay = 30
        for (let i = 0; i < this.content.length; i++) {
            setTimeout(() => {
                content += this.content.charAt(i)
                context.innerHTML = content + "_"
            }, delay * i)
        }
        setTimeout(() => {
            context.innerHTML = content
        }, delay * this.content.length)
    }
}