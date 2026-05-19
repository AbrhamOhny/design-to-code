export function getWeekdays(locale = navigator.language) {
    const formatter = new Intl.DateTimeFormat(locale, {
        weekday: "long",
    });

    // Start from a known Sunday
    const start = new Date(Date.UTC(2024, 0, 7));

    return Array.from({ length: 7 }, (_, i) => {
        const date = new Date(start);
        date.setUTCDate(start.getUTCDate() + i);
        return formatter.format(date);
    });
}

export const sum = (arr: number[]) => arr.reduce((a, b) => a + b, 0);

export function resolveCssColor(variable: string): string {
    const el = document.createElement("div");
    el.style.color = `var(${variable})`;
    document.body.appendChild(el);
    const resolved = getComputedStyle(el).color;
    document.body.removeChild(el);
    return resolved;
}
